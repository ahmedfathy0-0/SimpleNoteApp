<?php
use Core\Database;

class TeamController {
    public function index() {
        $title = "Team";
        view('team', compact('title'));
    }
}

$controller = new TeamController();