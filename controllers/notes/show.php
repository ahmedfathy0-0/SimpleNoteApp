<?php
use Core\Database;
use Core\App;

class NotesShowController {
    public function show($id) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $note = $db->getNote($id);
        if (!$note) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::FORBIDDEN);
        }
        $title = "Note Details";
        view('notes/show', compact('title', 'note'));
    }
}

$controller = new NotesShowController();
