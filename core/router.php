<?php
require_once base_path('core/Router.php');
require_once base_path('functions/base_path.php');
require_once base_path('functions/abort.php');

$router = new Router();

$router->get('/notes', [
    'controller' => 'HTTP/controllers/notes/index.php',
    'class' => 'NotesIndexController',
    'method' => 'index'
]);
$router->middleware('GET', '/notes', 'auth');

$router->get('/note', [
    'controller' => 'HTTP/controllers/notes/show.php',
    'class' => 'NotesShowController',
    'method' => 'show',
    'params' => [$_GET['id'] ?? null]
]);
$router->middleware('GET', '/note', 'auth');

$router->get('/note/create', [
    'controller' => 'HTTP/controllers/notes/create.php',
    'class' => 'NotesCreateController',
    'method' => 'create'
]);
$router->post('/note/store', [
    'controller' => 'HTTP/controllers/notes/store.php',
    'class' => 'NotesStoreController',
    'method' => 'store'
]);
$router->get('/note/edit', [
    'controller' => 'HTTP/controllers/notes/edit.php',
    'class' => 'NotesEditController',
    'method' => 'edit',
    'params' => [$_GET['id'] ?? null]
]);
$router->patch('/note/update', [
    'controller' => 'HTTP/controllers/notes/update.php',
    'class' => 'NotesUpdateController',
    'method' => 'update',
    'params' => [$_GET['id'] ?? null]
]);
$router->delete('/note', [
    'controller' => 'HTTP/controllers/notes/destroy.php',
    'class' => 'NotesDestroyController',
    'method' => 'destroy',
    'params' => [$_GET['id'] ?? null]
]);
$router->middleware('GET', '/note', 'auth');
$router->middleware('PATCH', '/note/update', 'auth');
$router->middleware('DELETE', '/note', 'auth');

// Other routes (dashboard, team, projects, calendar)
$router->get('/', [
    'controller' => 'HTTP/controllers/index.php',
    'class' => 'DashboardController',
    'method' => 'index'
]);

$router->get('/signup', [
    'controller' => 'HTTP/controllers/signup/show.php',
    'class' => 'SignupController',
    'method' => 'show'
]);
$router->post('/signup', [
    'controller' => 'HTTP/controllers/signup/signup.php',
    'class' => 'SignupController',
    'method' => 'register'
]);
$router->get('/signin', [
    'controller' => 'HTTP/controllers/signin/show.php',
    'class' => 'SigninController',
    'method' => 'show'
]);
$router->post('/signin', [
    'controller' => 'HTTP/controllers/signin/login.php',
    'class' => 'LoginController',
    'method' => 'login'
]);
$router->get('/logout', [
    'controller' => 'HTTP/controllers/signin/logout.php',
    'class' => 'LogoutController',
    'method' => 'logout'
]);

$page = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = request_method();

$router->dispatch($page, $method);
