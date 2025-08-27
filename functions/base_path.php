<?php
function base_path($path = '') {
    return BASE_PATH . ltrim($path, '/../');
}

function view($view, $data = []) {
    extract($data);
    require base_path('views/' . ltrim($view, '/') . '.php');
}

function request_method() {
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST' && isset($_POST['_method'])) {
        return strtoupper($_POST['_method']);
    }
    return $method;
}