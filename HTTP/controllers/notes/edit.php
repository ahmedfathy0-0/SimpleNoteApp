<?php
require_once base_path('core/Session.php');
use Core\Session;
use Core\Database;
use Core\App;

class NotesEditController {
    public function create() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = Session::get('user_id');
        $title = "Edit Note";
        $success = Session::getFlash('success');
        $error = Session::getFlash('error');

        view('notes/edit', compact('title', 'success', 'error'));
    }

    public function edit($id = null) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = Session::get('user_id');
        $title = "Edit Note";
        $success = Session::getFlash('success');
        $error = Session::getFlash('error');
        $note = null;

        if ($id) {
            $note = $db->getNoteByUser($id, $user_id);
            if (!$note) {
                $error = "Note not found.";
            }
        } else {
            $error = "No note ID provided.";
        }

        view('notes/edit', compact('title', 'success', 'error', 'note'));
    }
}

$controller = new NotesEditController();