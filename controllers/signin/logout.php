<?php

class LogoutController {
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /signin');
        exit;
    }
}

$controller = new LogoutController();
