<?php
use Core\Database;
use Core\App;
require_once base_path('core/Session.php');
use Core\Session;

class NotesDestroyController {
    public function destroy($id) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = Session::get('user_id');

        if (!$db->userOwnsNote($user_id, $id)) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::FORBIDDEN);
        }
        if ($db->deleteNoteByUser($id, $user_id)) {
            http_response_code(204); // No Content
            exit;
        } else {
            http_response_code(500);
            echo "Failed to delete note.";
            exit;
        }
    }
}

$controller = new NotesDestroyController();
