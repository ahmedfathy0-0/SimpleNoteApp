<?php
// controllers/DashboardController.php
use Core\Database;

$_SESSION['user_id'] = 1; 

class DashboardController
{
    public function index()
    {
        $title = "Dashboard"; // Pass a title to the view
        view('index', compact('title'));
    }
}

$controller = new DashboardController();
