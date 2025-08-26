<?php
$title = "Projects";
ob_start();
?>
  <h1 class="text-xl font-bold text-white mb-4">Projects</h1>
  <p class="text-gray-300">Here are your current projects.</p>
<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
