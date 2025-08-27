<?php
require_once base_path('core/Router.php');
require_once base_path('functions/abort.php');

$router = new Router();

$router->get('/', [
    'controller' => 'controllers/DashboardController.php',
    'class' => 'DashboardController',
    'method' => 'index'
]);
$router->get('/team', [
    'controller' => 'controllers/TeamController.php',
    'class' => 'TeamController',
    'method' => 'index'
]);
$router->get('/projects', [
    'controller' => 'controllers/ProjectsController.php',
    'class' => 'ProjectsController',
    'method' => 'index'
]);
$router->get('/calendar', [
    'controller' => 'controllers/CalendarController.php',
    'class' => 'CalendarController',
    'method' => 'index'
]);
$router->get('/notes', [
    'controller' => 'controllers/notes/NotesController.php',
    'class' => 'NotesController',
    'method' => 'index'
]);
$router->get('/note', [
    'controller' => 'controllers/notes/NotesController.php',
    'class' => 'NotesController',
    'method' => 'show',
    'params' => [$_GET['id'] ?? null]
]);
$router->get('/note/create', [
    'controller' => 'controllers/notes/CreateNoteController.php',
    'class' => 'CreateNoteController',
    'method' => 'index'
]);
$router->post('/note/create', [
    'controller' => 'controllers/notes/CreateNoteController.php',
    'class' => 'CreateNoteController',
    'method' => 'index'
]);
$router->delete('/note', [
    'controller' => 'controllers/notes/NotesController.php',
    'class' => 'NotesController',
    'method' => 'show',
    'params' => [$_GET['id'] ?? null]
]);

$page = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($page, $method);
