<?php 

use Core\Database;
use Core\App;

class LoginController {
    public function login() {
        $container = App::getContainer();
        $db = $container->resolve('Database');
        $title = "Sign In";
        $error = null;
        $success = false;

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username && $password) {
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
        } else {
            $error = "All fields are required.";
        }

        view('signin', compact('title', 'error', 'success'));
    }
}

$controller = new LoginController();