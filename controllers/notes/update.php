<?php
use Core\Database;
use Core\App;

class NotesUpdateController {
    public function update($id = null) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = $_SESSION['user_id'] ?? null;
        $title = "Edit Note";
        $success = false;
        $error = null;
        $note = null;

        if (!$id) {
            $error = "No note ID provided.";
            view('notes/edit', compact('title', 'success', 'error', 'note'));
            return;
        }

        // Authorization check
        if (!$db->userOwnsNote($user_id, $id)) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::FORBIDDEN);
        }

        $note_title = trim($_POST['title'] ?? '');
        $note_content = trim($_POST['content'] ?? '');

        if ($note_title && $note_content) {
            if ($db->updateNote($id, $user_id, $note_title, $note_content)) {
                $success = true;
                $note = $db->getNoteByUser($id, $user_id);
            } else {
                $error = "Failed to update note.";
                $note = $db->getNoteByUser($id, $user_id);
            }
        } else {
            $error = "Title and content are required.";
            $note = $db->getNoteByUser($id, $user_id);
        }

        view('notes/edit', compact('title', 'success', 'error', 'note'));
    }
}

$controller = new NotesUpdateController();
   