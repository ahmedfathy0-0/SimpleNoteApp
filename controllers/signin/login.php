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
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $db->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $success = true;
                header('Location: /notes');
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