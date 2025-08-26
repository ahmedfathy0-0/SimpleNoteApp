<?php
require_once __DIR__ . '/../Response.php';

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
    $viewFile = __DIR__ . '/../views/' . $code . '.php';
    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        echo "<h1>$code Error</h1>";
    }
    exit;
}
