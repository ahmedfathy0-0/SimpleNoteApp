<?php
use Core\Database;
use Core\App;
use Core\Validator;

class SignupController {
    public function register() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $validator = $container->resolve('Validator');
        $title = "Sign Up";
        $error = null;
        $success = false;

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $missing = Validator::required(['username', 'email', 'password'], $_POST);
        if ($missing) {
            $error = "Missing fields: " . implode(', ', $missing);
        } elseif (!Validator::email($email)) {
            $error = "Invalid email address.";
        } elseif (!Validator::minLength($password, 6)) {
            $error = "Password must be at least 6 characters.";
        } else {
            $result = $db->registerUser($username, $email, $password);
            if ($result === true) {
                $success = true;
            } else {
                $error = $result;
            }
        }

        view('signup', compact('title', 'error', 'success'));
    }
}

$controller = new SignupController();
