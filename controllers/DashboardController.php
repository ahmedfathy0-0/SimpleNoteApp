<?php
// controllers/DashboardController.php

class DashboardController
{
    public function index()
    {
        $title = "Dashboard"; // Pass a title to the view
        view('dashboard', compact('title'));
    }
}

$controller = new DashboardController();
