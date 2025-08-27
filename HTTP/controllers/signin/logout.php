<?php

use Core\App;
require_once base_path('core/Session.php');
use Core\Session;

class LogoutController {
    public function logout() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
        $auth->logout();
        Session::destroy();
        header('Location: /signin');
        exit;
    }
}

$controller = new LogoutController();
