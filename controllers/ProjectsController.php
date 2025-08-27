<?php
use Core\Database;

class ProjectsController {
    public function index() {
        $title = "Projects";
        view('projects', compact('title'));
    }
}

$controller = new ProjectsController();