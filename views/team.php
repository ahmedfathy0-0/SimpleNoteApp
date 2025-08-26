<?php
$title = "Team";
ob_start();
?>
  <h1 class="text-xl font-bold text-white mb-4">Team</h1>
  <p class="text-gray-300">Meet your awesome team members here!</p>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');
