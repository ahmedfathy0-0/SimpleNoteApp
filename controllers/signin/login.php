<?php 

use Core\Database;
use Core\App;
use Core\Validator;

class LoginController {
    public function login() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $validator = $container->resolve('Validator');
        $title = "Sign In";
        $error = null;
        $success = false;

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $missing = Validator::required(['username', 'password'], $_POST);
        if ($missing) {
            $error = "Missing fields: " . implode(', ', $missing);
        } else {
            $user = $db->authenticateUser($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $success = true;
                header('Location: /');
                exit;
            } else {
                $error = "Invalid credentials.";
            }
        }

        view('signin', compact('title', 'error', 'success'));
    }
}

$controller = new LoginController();