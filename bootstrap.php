<?php

require_once base_path('core/Container.php');
require_once base_path('core/App.php');
require_once base_path('core/database.php'); // <-- Add this line

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


App::setContainer($container);

