<?php
class Router {
    protected $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'PATCH' => [],
        'DELETE' => [],
    ];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function put($uri, $action) {
        $this->routes['PUT'][$uri] = $action;
    }

    public function patch($uri, $action) {
        $this->routes['PATCH'][$uri] = $action;
    }

    public function delete($uri, $action) {
        $this->routes['DELETE'][$uri] = $action;
    }

    // Add middleware to a route
    public function middleware($method, $uri, $middleware) {
        if (isset($this->routes[$method][$uri])) {
            $this->routes[$method][$uri]['middleware'] = $middleware;
        }
    }

    public function dispatch($uri, $method) {
        $action = $this->routes[$method][$uri] ?? null;
        if (!$action) {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::NOT_FOUND);
        }

        // Middleware check
        if (!empty($action['middleware'])) {
            $middleware = $action['middleware'];
            require_once base_path("core/middleware/{$middleware}.php");
            $middlewareFunc = "{$middleware}_middleware";
            if (function_exists($middlewareFunc)) {
                $middlewareFunc();
            }
        }

        require_once base_path($action['controller']);
        $controllerClass = $action['class'];
        $controller = new $controllerClass();
        $method = $action['method'];
        if (method_exists($controller, $method)) {
            $params = $action['params'] ?? [];
            call_user_func_array([$controller, $method], $params);
        } else {
            require_once base_path('functions/abort.php');
            abort(\Core\Response::NOT_FOUND);
        }
    }
}
