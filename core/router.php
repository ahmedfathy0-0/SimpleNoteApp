<?php
require_once base_path('core/Router.php');
require_once base_path('functions/base_path.php');
require_once base_path('functions/abort.php');

$router = new Router();

$router->get('/notes', [
    'controller' => 'controllers/notes/index.php',
    'class' => 'NotesIndexController',
    'method' => 'index'
]);
$router->get('/note', [
    'controller' => 'controllers/notes/show.php',
    'class' => 'NotesShowController',
    'method' => 'show',
    'params' => [$_GET['id'] ?? null]
]);
$router->get('/note/create', [
    'controller' => 'controllers/notes/create.php',
    'class' => 'NotesCreateController',
    'method' => 'create'
]);
$router->post('/note/store', [
    'controller' => 'controllers/notes/store.php',
    'class' => 'NotesStoreController',
    'method' => 'store'
]);
$router->get('/note/edit', [
    'controller' => 'controllers/notes/edit.php',
    'class' => 'NotesEditController',
    'method' => 'edit',
    'params' => [$_GET['id'] ?? null]
]);
$router->patch('/note/update', [
    'controller' => 'controllers/notes/update.php',
    'class' => 'NotesUpdateController',
    'method' => 'update',
    'params' => [$_GET['id'] ?? null]
]);

$router->delete('/note', [
    'controller' => 'controllers/notes/destroy.php',
    'class' => 'NotesDestroyController',
    'method' => 'destroy',
    'params' => [$_GET['id'] ?? null]
]);

// Other routes (dashboard, team, projects, calendar)
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

$page = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = request_method();

$router->dispatch($page, $method);
