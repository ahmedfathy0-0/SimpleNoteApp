<?php

require_once base_path('core/Container.php');
require_once base_path('core/App.php');
require_once base_path('core/database.php'); // <-- Add this line
require_once base_path('core/Validator.php'); // <-- Add this line
require_once base_path('core/Authenticator.php'); // <-- Add this line

use Core\Container;
use Core\App;

global $container;
$container = new Container();

$container->bind('config', function() {
    return require base_path('core/config.php');
});

$container->bind('Database', function() use ($container) {
    $config = $container->resolve('config');
    return new \Core\Database($config['database'], 'root', 'NEW@22wntg');
});

$container->bind('Validator', function() {
    return new \Core\Validator();
});

$container->bind('Authenticator', function() use ($container) {
    $db = $container->resolve('Database');
    return new \Core\Authenticator($db);
});

App::setContainer($container);

