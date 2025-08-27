<?php
ob_start();
?>
<div class="max-w-3xl mx-auto mt-1 flex items-center justify-between">
    <h1 class="text-xl font-bold text-white mb-4"><?= $title ?></h1>
    <a href="/notes" class="mb-6 inline-block bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded shadow transition">
        &larr; Back to Notes
    </a>
</div>
<?php if (!empty($success)): ?>
  <div class="mb-4 p-3 rounded bg-green-700 text-white">Note updated successfully!</div>
<?php endif; ?>
<?php if (!empty($error)): ?>
  <div class="mb-4 p-3 rounded bg-red-700 text-white"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form id="edit-note-form" method="post" action="/note/update?id=<?= isset($note['note_id']) ? htmlspecialchars($note['note_id']) : '' ?>" class="bg-gray-800 rounded-lg shadow p-6 max-w-lg mx-auto">
  <input type="hidden" name="_method" value="PATCH">
  <div class="mb-4">
    <label for="title" class="block text-gray-300 mb-2">Title</label>
    <input type="text" id="title" name="title" class="w-full px-3 py-2 rounded bg-gray-900 text-white border border-gray-700" required value="<?= isset($note['title']) ? htmlspecialchars($note['title']) : '' ?>">
  </div>
  <div class="mb-4">
    <label for="content" class="block text-gray-300 mb-2">Content</label>
    <textarea id="content" name="content" maxlength="500" rows="5" class="w-full px-3 py-2 rounded bg-gray-900 text-white border border-gray-700" required><?= isset($note['content']) ? htmlspecialchars($note['content']) : '' ?></textarea>
  </div>
  <div class="flex gap-2">
    <button type="submit" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded">Update Note</button>
    <button type="button" id="cancel-btn" class="bg-gray-600 hover:bg-gray-500 text-white font-semibold px-4 py-2 rounded">Cancel</button>
  </div>
</form>
<script>
document.getElementById('cancel-btn').addEventListener('click', function() {
  // Reset fields to initial values
  document.getElementById('title').value = <?= json_encode($note['title'] ?? '') ?>;
  document.getElementById('content').value = <?= json_encode($note['content'] ?? '') ?>;
});
</script>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');
