<?php
function auth_middleware() {
    if (empty($_SESSION['user_id'])) {
        header('Location: /signin');
        exit;
    }
}
