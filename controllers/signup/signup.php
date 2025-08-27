<?php
use Core\Database;
use Core\App;

class SignupController {
    public function register() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Sign Up";
        $error = null;
        $success = false;

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username && $email && $password) {
            $result = $db->registerUser($username, $email, $password);
            if ($result === true) {
                $success = true;
            } else {
                $error = $result; // error message from Database
            }
        } else {
            $error = "All fields are required.";
        }

        view('signup', compact('title', 'error', 'success'));
    }
}

$controller = new SignupController();
             