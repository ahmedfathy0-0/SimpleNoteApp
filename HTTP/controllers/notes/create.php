<?php
use Core\Database;
use Core\App;
use Core\Session;

class NotesCreateController {
    public function create() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = Session::get('user_id');
        $title = "Create Note";
        $success = false;
        $error = null;

        view('notes/create', compact('title', 'success', 'error'));
    }
}

$controller = new NotesCreateController();
