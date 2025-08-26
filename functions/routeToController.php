<?php
function routeToController($page, $routes) {
    if (array_key_exists($page, $routes)) {
        require_once base_path($routes[$page]);
        if (isset($controller)) {
            $controller->index();
        }
    } else {
        http_response_code(404);
        require base_path('views/error/404.php');
        exit;
    }
}
