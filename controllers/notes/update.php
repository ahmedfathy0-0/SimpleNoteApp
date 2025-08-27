<?php
use Core\Database;
use Core\App;

class NotesUpdateController {
    public function update($id = null) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = 1; // Replace with actual user logic if needed
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
                $note = $db->getNote($id);
            } else {
                $error = "Failed to update note.";
                $note = $db->getNote($id);
            }
        } else {
            $error = "Title and content are required.";
            $note = $db->getNote($id);
        }

        view('notes/edit', compact('title', 'success', 'error', 'note'));
    }
}

$controller = new NotesUpdateController();
