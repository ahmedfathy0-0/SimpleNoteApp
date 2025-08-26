<?php
class CalendarController {
    public function index() {
        $title = "Calendar";
        require __DIR__ . '/../views/calendar.php';

    }
}

$controller = new CalendarController();

