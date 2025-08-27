<?php
use Core\Database;
use Core\App;

class NotesDestroyController {
    public function destroy($id) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = 1; // Replace with actual user logic if available

        if (!$db->userOwnsNote($user_id, $id)) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::FORBIDDEN);
        }
        if ($db->deleteNote($id)) {
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
