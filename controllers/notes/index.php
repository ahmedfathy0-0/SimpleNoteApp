<?php
use Core\Database;
use Core\App;

class NotesIndexController {
    public function index() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Notes";
        $notes = $db->getAllNotes();
        view('notes/index', compact('title', 'notes'));
    }
}

$controller = new NotesIndexController();
