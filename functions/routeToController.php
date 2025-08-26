<?php
function routeToController($page, $routes) {
    if (array_key_exists($page, $routes)) {
        require_once __DIR__ . '/../' . $routes[$page];
        if (isset($controller)) {
            $controller->index();
        }
    } else {
        http_response_code(404);
        require __DIR__ . '/../views/notfound.php';
        exit;
    }
}
