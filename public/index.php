<?php

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'functions/base_path.php';
require_once base_path('core/database.php');
$config = require_once base_path('core/config.php');

$db = new Database();
global $db;

require_once base_path('core/router.php');
