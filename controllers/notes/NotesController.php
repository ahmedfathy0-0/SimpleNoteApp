<?php
class NotesController {
    public function index() {
        global $db, $config;
        $db->getConnection($config['database'], 'root', 'NEW@22wntg');
        $title = "Notes";
        require __DIR__ . '//../../views/notes/index.php';
    }

    public function show($id) {
        global $db, $config;
        $db->getConnection($config['database'], 'root', 'NEW@22wntg');
        // Handle delete via DELETE request
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if ($db->deleteNote($id)) {
                http_response_code(204); // No Content
                exit;
            } else {
                http_response_code(500);
                echo "Failed to delete note.";
                exit;
            }
        }
        $title = "Note Details";
        require __DIR__ . '/../../views/notes/show.php';
    }
}

$controller = new NotesController();

// Handle /note?id=... route
if (parse_url($_SERVER['REQUEST_URI'])['path'] === '/note') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $controller->show($id);
        exit;
    }
}