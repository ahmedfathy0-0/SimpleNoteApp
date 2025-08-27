<?php
require_once __DIR__ . '/../Session.php';
use Core\Session;

function auth_middleware() {
    if (empty(Session::get('user_id'))) {
        header('Location: /signin');
        exit;
    }
}
