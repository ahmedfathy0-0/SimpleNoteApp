<?php
class ProjectsController {
    public function index() {
        $title = "Projects";
        require __DIR__ . '/../views/projects.php';

    }
}

$controller = new ProjectsController();