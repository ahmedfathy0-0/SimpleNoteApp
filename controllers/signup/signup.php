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
            // Check if user exists
            $query = "SELECT * FROM users WHERE username = :username OR email = :email";
            $stmt = $db->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->fetch()) {
                $error = "Username or email already exists.";
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                $stmt = $db->conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed);
                if ($stmt->execute()) {
                    $success = true;
                } else {
                    $error = "Failed to register.";
                }
            }
        } else {
            $error = "All fields are required.";
        }

        view('signup', compact('title', 'error', 'success'));
    }
}

$controller = new SignupController();
