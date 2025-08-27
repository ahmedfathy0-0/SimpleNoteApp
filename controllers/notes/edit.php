<?php
use Core\Database;
use Core\App;

class NotesEditController {
    public function create() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Edit Note";
        $success = false;
        $error = null;

        view('notes/edit', compact('title', 'success', 'error'));
    }

    public function edit($id = null) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Edit Note";
        $success = false;
        $error = null;
        $note = null;

        if ($id) {
            $note = $db->getNote($id);
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