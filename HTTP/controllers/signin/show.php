<?php
use Core\Database;
use Core\App;
use Core\Session;

class SigninController {
    public function show() {
        $title = "Sign In";
        $error = Session::getFlash('error');
        $success = Session::getFlash('success');
        view('signin', compact('title', 'error', 'success'));
    }
}

$controller = new SigninController();
