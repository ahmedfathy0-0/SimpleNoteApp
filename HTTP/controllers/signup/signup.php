<?php
use Core\App;
use Core\Session;

require_once base_path('HTTP/Forms/SignupForm.php');
require_once base_path('core/Session.php');
use HTTP\Forms\SignupForm;

class SignupController {
    public function register() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
        $title = "Sign Up";
        $error = Session::getFlash('error');
        $success = Session::getFlash('success');

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $form = new SignupForm();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$form->validate($username, $email, $password)) {
                $errors = $form->getErrors();
                Session::flash('error', implode(', ', $errors));
                header('Location: /signup');
                exit;
            } else {
                $result = $auth->signup($username, $email, $password);
                if ($result === true) {
                    Session::flash('success', true);
                    header('Location: /signup');
                    exit;
                } else {
                    Session::flash('error', $result);
                    header('Location: /signup');
                    exit;
                }
            }
        }

        view('signup', compact('title', 'error', 'success'));
    }
}

$controller = new SignupController();
