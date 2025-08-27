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
    'controller' => 'controllers/index.php',
    'class' => 'DashboardController',
    'method' => 'index'
]);

$router->get('/signup', [
    'controller' => 'controllers/signup/show.php',
    'class' => 'SignupController',
    'method' => 'show'
]);
$router->post('/signup', [
    'controller' => 'controllers/signup/signup.php',
    'class' => 'SignupController',
    'method' => 'register'
]);
$router->get('/signin', [
    'controller' => 'controllers/signin/show.php',
    'class' => 'SigninController',
    'method' => 'show'
]);
$router->post('/signin', [
    'controller' => 'controllers/signin/login.php',
    'class' => 'LoginController',
    'method' => 'login'
]);
$router->get('/logout', [
    'controller' => 'controllers/signin/logout.php',
    'class' => 'LogoutController',
    'method' => 'logout'
]);

$page = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = request_method();

$router->dispatch($page, $method);
