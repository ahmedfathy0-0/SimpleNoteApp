<?php
use Core\Database;
use Core\App;

class NotesCreateController {
    public function create() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Create Note";
        $success = false;
        $error = null;

        view('notes/create', compact('title', 'success', 'error'));
    }
}

$controller = new NotesCreateController();
