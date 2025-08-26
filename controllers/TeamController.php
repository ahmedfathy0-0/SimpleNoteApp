<?php
class TeamController {
    public function index() {
        $title = "Team";
        require __DIR__ . '/../views/team.php';
    }
}

$controller = new TeamController();