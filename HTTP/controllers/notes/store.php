<?php
use Core\Database;
use Core\App;
use Core\Validator;
require_once base_path('core/Session.php');
use Core\Session;

class NotesStoreController {
    public function store() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $validator = $container->resolve('Validator');
        $user_id = Session::get('user_id');
        $note_title = trim($_POST['title'] ?? '');
        $note_content = trim($_POST['content'] ?? '');

        $success = Session::getFlash('success');
        $error = Session::getFlash('error');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $missing = Validator::required(['title', 'content'], $_POST);
            if ($missing) {
                Session::flash('error', "Missing fields: " . implode(', ', $missing));
                header('Location: /notes/create');
                exit;
            } elseif (!Validator::maxLength($note_content, 500)) {
                Session::flash('error', "Content must be 500 characters or less.");
                header('Location: /notes/create');
                exit;
            } else {
                if ($db->createNote($user_id, $note_title, $note_content)) {
                    Session::flash('success', true);
                    header('Location: /notes');
                    exit;
                } else {
                    Session::flash('error', "Failed to create note.");
                    header('Location: /notes/create');
                    exit;
                }
            }
        }

        $title = "Create Note";
        view('notes/create', compact('title', 'success', 'error'));
    }
}

$controller = new NotesStoreController();
