<?php
use Core\Database;
use Core\App;
use Core\Session;

class SignupController {
    public function show() {
        $title = "Sign Up";
        $error = Session::getFlash('error');
        $success = Session::getFlash('success');
        view('signup', compact('title', 'error', 'success'));
    }
}

$controller = new SignupController();
