<?php
use Core\Database;

class NotesController {
    public function index() {
        global $db, $config;
        $db->getConnection($config['database'], 'root', 'NEW@22wntg');
        $title = "Notes";
        $notes = $db->getAllNotes();
        view('notes/index', compact('title', 'notes'));
    }

    public function show($id) {
        global $db, $config;
        $db->getConnection($config['database'], 'root', 'NEW@22wntg');
         $user_id = 1; // Replace with actual user logic if available

        // Handle delete via DELETE request
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if (!$db->userOwnsNote($user_id, $id)) {
                require_once base_path('functions/abort.php');
                abort(\Core\Response::FORBIDDEN);
            }
            if ($db->deleteNote($id)) {
                http_response_code(204); // No Content
                exit;
            } else {
                http_response_code(500);
                echo "Failed to delete note.";
                exit;
            }
        }
        $note = $db->getNote($id);
        if (!$note) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::FORBIDDEN);
        }
        $title = "Note Details";
        view('notes/show', compact('title', 'note'));
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