<?php
use Core\Database;
use Core\App;
require_once base_path('core/Session.php');
use Core\Session;



class NotesIndexController {
    public function index() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Notes";
        $user_id = Session::get('user_id');
        $notes = $db->getAllNotesByUser($user_id);
        view('notes/index', compact('title', 'notes'));
    }
}

$controller = new NotesIndexController();
