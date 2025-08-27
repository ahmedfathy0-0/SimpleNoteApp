<?php
use Core\Database;
use Core\App;

class NotesShowController {
    public function show($id) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            header('Location: /signin');
            exit;
        }
        $note = $db->getNoteByUser($id, $user_id);
        if (!$note) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::FORBIDDEN);
        }
        $title = "Note Details";
        view('notes/show', compact('title', 'note'));
    }
}

$controller = new NotesShowController();
