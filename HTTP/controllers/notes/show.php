<?php
use Core\Database;
use Core\App;

class NotesShowController {
    public function show($id) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = $_SESSION['user_id'] ?? null;
        $note = $db->getNoteByUser($id, $user_id);
        if (!$note) {
            http_response_code(403);
            echo "Forbidden";
            exit;
        }
        $title = "Note Details";
        view('notes/show', compact('title', 'note'));
    }
}

$controller = new NotesShowController();
