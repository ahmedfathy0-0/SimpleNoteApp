<?php

use Core\App;

class LogoutController {
    public function logout() {
        $container = App::getContainer();
        $auth = $container->resolve('Authenticator');
        $auth->logout();
        header('Location: /signin');
        exit;
    }
}

$controller = new LogoutController();
