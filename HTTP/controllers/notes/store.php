<?php
use Core\Database;
use Core\App;
use Core\Validator;

class NotesStoreController {
    public function store() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $validator = $container->resolve('Validator');
        $user_id = $_SESSION['user_id'] ?? null;
        $note_title = trim($_POST['title'] ?? '');
        $note_content = trim($_POST['content'] ?? '');

        $success = false;
        $error = null;

        $missing = Validator::required(['title', 'content'], $_POST);
        if ($missing) {
            $error = "Missing fields: " . implode(', ', $missing);
        } elseif (!Validator::maxLength($note_content, 500)) {
            $error = "Content must be 500 characters or less.";
        } else {
            if ($db->createNote($user_id, $note_title, $note_content)) {
                $success = true;
            } else {
                $error = "Failed to create note.";
            }
        }

        $title = "Create Note";
        view('notes/create', compact('title', 'success', 'error'));
    }
}

$controller = new NotesStoreController();
