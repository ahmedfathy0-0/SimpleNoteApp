<?php

class CreateNoteController {
    public function index() {
        global $db, $config;
        $db->getConnection($config['database'], 'root', 'NEW@22wntg');
        $title = "Create Note";
        $success = false;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = 1; // For demo, hardcoded. Replace with actual user logic if needed.
            $note_title = trim($_POST['title'] ?? '');
            $note_content = trim($_POST['content'] ?? '');

            if ($note_title && $note_content) {
                if ($db->createNote($user_id, $note_title, $note_content)) {
                    $success = true;
                } else {
                    $error = "Failed to create note.";
                }
            } else {
                $error = "Title and content are required.";
            }
        }

        require __DIR__ . '/../../views/notes/create.php';
    }
}

$controller = new CreateNoteController();