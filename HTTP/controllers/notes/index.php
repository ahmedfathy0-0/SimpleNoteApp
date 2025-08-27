<?php
use Core\Database;
use Core\App;



class NotesIndexController {
    public function index() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Notes";
        $user_id = $_SESSION['user_id'] ?? null;
        $notes = $db->getAllNotesByUser($user_id);
        view('notes/index', compact('title', 'notes'));
    }
}

$controller = new NotesIndexController();
  