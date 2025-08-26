<?php
require_once base_path('core/Response.php');

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
    $viewFile = base_path('views/error/' . $code . '.php');
    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        echo "<h1>$code Error</h1>";
    }
    exit;
}
