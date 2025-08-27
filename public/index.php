<?php

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'core/Session.php';

use Core\Session;

Session::start();

require_once BASE_PATH . 'functions/base_path.php';
require_once base_path('core/config.php');
require_once base_path('bootstrap.php');

use Core\Container;

$page = parse_url($_SERVER['REQUEST_URI'])['path'] ?? '/';

// Redirect to /signin if not authenticated and not accessing auth routes
if (
    empty(Session::get('user_id')) &&
    !in_array($page, ['/signin', '/signup'])
) {
    header('Location: /signin');
    exit;
}

require_once base_path('core/router.php');
