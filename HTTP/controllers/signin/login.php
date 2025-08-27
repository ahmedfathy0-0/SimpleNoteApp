<?php 

use Core\App;
use HTTP\Forms\LoginForm;

class LoginController {
    public function login() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
        $title = "Sign In";
        $error = null;
        $success = false;

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        require_once base_path('HTTP/Forms/LoginForm.php');
        $form = new LoginForm();

        if (!$form->validate($username, $password)) {
            $errors = $form->getErrors();
            $error = implode(', ', $errors);
        } else {
            if ($auth->login($username, $password)) {
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