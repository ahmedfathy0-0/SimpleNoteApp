<?php
// controllers/DashboardController.php

class DashboardController
{
    public function index()
    {
        $title = "Dashboard"; // Pass a title to the view
        require __DIR__ . '/../views/dashboard.php';
    }
}

$controller = new DashboardController();
