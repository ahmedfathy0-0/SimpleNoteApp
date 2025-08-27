<?php
use Core\App;
use Core\Validator;

class SignupController {
    public function register() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
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
            $result = $auth->signup($username, $email, $password);
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
$controller = new SignupController();
