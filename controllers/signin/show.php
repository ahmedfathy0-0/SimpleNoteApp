<?php
use Core\Database;
use Core\App;

class SigninController {
    public function show() {
        $title = "Sign In";
        $error = null;
        $success = false;
        view('signin', compact('title', 'error', 'success'));
    }
}

$controller = new SigninController();
