<?php
require_once base_path('core/Session.php');
use Core\Session;
use Core\Database;
use Core\App;

class NotesUpdateController {
    public function update($id = null) {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $user_id = Session::get('user_id');
        $title = "Edit Note";
        $success = Session::getFlash('success');
        $error = Session::getFlash('error');
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
                Session::flash('success', true);
                header("Location: /note/edit?id=$id");
                exit;
            } else {
                Session::flash('error', "Failed to update note.");
                header("Location: /notes/edit?id=$id");
                exit;
            }
        } else {
            Session::flash('error', "Title and content are required.");
            header("Location: /notes/edit?id=$id");
            exit;
        }

        $note = $db->getNoteByUser($id, $user_id);
        view('notes/edit', compact('title', 'success', 'error', 'note'));
    }
}

$controller = new NotesUpdateController();
