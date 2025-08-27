<?php
use Core\Database;
use Core\App;

class SignupController {
    public function show() {
        $title = "Sign Up";
        $error = null;
        $success = false;
        view('signup', compact('title', 'error', 'success'));
    }
}

$controller = new SignupController();
