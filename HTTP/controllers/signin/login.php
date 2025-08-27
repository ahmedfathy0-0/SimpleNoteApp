<?php 

use Core\App;
use HTTP\Forms\LoginForm;
use Core\Session;

class LoginController {
    public function login() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
        $title = "Sign In";
        $error = Session::getFlash('error');
        $success = Session::getFlash('success');

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        require_once base_path('HTTP/Forms/LoginForm.php');
        $form = new LoginForm();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$form->validate($username, $password)) {
                $errors = $form->getErrors();
                Session::flash('error', implode(', ', $errors));
                header('Location: /signin');
                exit;
            } else {
                if ($auth->login($username, $password)) {
                    Session::flash('success', true);
                    header('Location: /');
                    exit;
                } else {
                    Session::flash('error', "Invalid credentials.");
                    header('Location: /signin');
                    exit;
                }
            }
        }

        view('signin', compact('title', 'error', 'success'));
    }
}

$controller = new LoginController();