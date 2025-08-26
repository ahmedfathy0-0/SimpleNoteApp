<?php
require_once base_path('functions/routeToController.php');
require_once base_path('functions/abort.php');

$page = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/DashboardController.php',
    '/team' => 'controllers/TeamController.php',
    '/projects' => 'controllers/ProjectsController.php',
    '/calendar' => 'controllers/CalendarController.php',
    '/notes' => 'controllers/notes/NotesController.php',
    '/note' => 'controllers/notes/NotesController.php',
    '/note/create' => 'controllers/notes/CreateNoteController.php',
];

if (!array_key_exists($page, $routes)) {
    abort(Response::NOT_FOUND);
}

routeToController($page, $routes);
