<?php
$title = "Calendar";
ob_start();
?>
  <h1 class="text-xl font-bold text-white mb-4">Calendar</h1>
  <p class="text-gray-300">Check your schedule and events here.</p>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');
