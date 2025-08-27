<?php
use Core\Database;

class CalendarController {
    public function index() {
        $title = "Calendar";
        view('calendar', compact('title'));
    }
}

$controller = new CalendarController();

