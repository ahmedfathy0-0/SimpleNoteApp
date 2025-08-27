<?php
// views/dashboard.php

ob_start(); // Start buffering page content
?>
  <p class="text-gray-300">Welcome to your dashboard!</p>
<?php
$content = ob_get_clean(); 

include base_path('views/layout.php');
