<?php
ob_start();
?>
<div class="max-w-3xl mx-auto mt-1 flex items-center justify-between">
    <h1 class="text-xl font-bold text-white mb-4">Create Note</h1>
    <a href="/notes" class="mb-6 inline-block bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded shadow transition">
        &larr; Back to Notes
    </a>
</div>
<?php if (!empty($success)): ?>
  <div class="mb-4 p-3 rounded bg-green-700 text-white">Note created successfully!</div>
<?php endif; ?>
<?php if (!empty($error)): ?>
  <div class="mb-4 p-3 rounded bg-red-700 text-white"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post" class="bg-gray-800 rounded-lg shadow p-6 max-w-lg mx-auto">
  <div class="mb-4">
    <label for="title" class="block text-gray-300 mb-2">Title</label>
    <input type="text" id="title" name="title" class="w-full px-3 py-2 rounded bg-gray-900 text-white border border-gray-700" required>
  </div>
  <div class="mb-4">
    <label for="content" class="block text-gray-300 mb-2">Content</label>
    <textarea id="content" name="content" maxlength="500" rows="5" class="w-full px-3 py-2 rounded bg-gray-900 text-white border border-gray-700" required></textarea>
  </div>
  <button type="submit" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded">Create Note</button>
</form>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');
