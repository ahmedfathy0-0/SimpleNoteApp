<?php
use Core\Database;
use Core\App;
require_once base_path('core/Session.php');
use Core\Session;

class NotesShowController {
    public function show($id) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = Session::get('user_id');
        $note = $db->getNoteByUser($id, $user_id);
        if (!$note) {
            http_response_code(403);
            echo "Forbidden";
            exit;
        }
        $title = "Note Details";
        view('notes/show', compact('title', 'note'));
    }
}

$controller = new NotesShowController();
