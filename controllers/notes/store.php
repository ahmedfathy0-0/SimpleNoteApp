<?php
use Core\Database;
use Core\App;

class NotesStoreController {
    public function store() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = 1; // Replace with actual user logic if needed
        $note_title = trim($_POST['title'] ?? '');
        $note_content = trim($_POST['content'] ?? '');

        $success = false;
        $error = null;

        if ($note_title && $note_content) {
            if ($db->createNote($user_id, $note_title, $note_content)) {
                $success = true;
            } else {
                $error = "Failed to create note.";
            }
        } else {
            $error = "Title and content are required.";
        }

        $title = "Create Note";
        view('notes/create', compact('title', 'success', 'error'));
    }
}

$controller = new NotesStoreController();
