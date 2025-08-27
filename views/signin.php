<?php
ob_start();
?>
<div class="max-w-lg mx-auto mt-8 bg-gray-800 rounded-lg shadow p-8">
  <h1 class="text-2xl font-bold text-white mb-6"><?= $title ?></h1>
  <?php if ($success): ?>
    <div class="mb-4 p-3 rounded bg-green-700 text-white">Signed in successfully!</div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div class="mb-4 p-3 rounded bg-red-700 text-white"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="post" action="/signin">
    <div class="mb-4">
      <label for="username" class="block text-gray-300 mb-2">Username</label>
      <input type="text" id="username" name="username" class="w-full px-3 py-2 rounded bg-gray-900 text-white border border-gray-700" required>
    </div>
    <div class="mb-4">
      <label for="password" class="block text-gray-300 mb-2">Password</label>
      <input type="password" id="password" name="password" class="w-full px-3 py-2 rounded bg-gray-900 text-white border border-gray-700" required>
    </div>
    <button type="submit" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded">Sign In</button>
  </form>
  <div class="mt-4 text-gray-400">
    Don't have an account? <a href="/signup" class="text-indigo-400 underline">Sign up</a>
  </div>
</div>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');
