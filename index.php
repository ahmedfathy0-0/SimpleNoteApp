<?php


require_once __DIR__ . '/functions/dd.php';
require_once __DIR__ . '/database.php';
$config = require_once __DIR__ . '/config.php';

$db = new Database();
global $db;

require_once __DIR__ . '/router.php';
