<?php
use Core\App;

require_once base_path('HTTP/Forms/SignupForm.php');
use HTTP\Forms\SignupForm;

class SignupController {
    public function register() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
        $title = "Sign Up";
        $error = null;
        $success = false;

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $form = new SignupForm();
        if (!$form->validate($username, $email, $password)) {
            $errors = $form->getErrors();
            $error = implode(', ', $errors);
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
