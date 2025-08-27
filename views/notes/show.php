<?php
if (!$note) {
    require_once base_path('functions/abort.php');
    abort(Response::FORBIDDEN);
}
$title = htmlspecialchars($note['title']);
ob_start();
?>
<div class="max-w-xl mx-auto bg-gray-800 rounded-lg shadow p-8 mt-8">
  <h1 class="text-2xl font-bold text-indigo-400 mb-4"><?= htmlspecialchars($note['title']) ?></h1>
  <p class="text-gray-300 mb-6"><?= nl2br(htmlspecialchars($note['content'])) ?></p>
  <div class="text-sm text-gray-500">Created at: <?= htmlspecialchars($note['created_at']) ?></div>
  <div class="flex justify-between mt-7 mb-6">
    <a href="/notes" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded shadow transition">
      Back to Notes
    </a>
    <div class="flex gap-2">
      <a
        href="/note/edit?id=<?= htmlspecialchars($note['note_id']) ?>"
        class="bg-green-500 hover:bg-green-400 text-white font-semibold px-4 py-2 rounded shadow transition"
      >
        Edit Note
      </a>
      <button
        onclick="if(confirm('Are you sure you want to delete this note?')) { fetch(window.location.href, {method: 'DELETE'}).then(() => window.location='/notes'); }"
        class="bg-red-500 hover:bg-red-400 text-white font-semibold px-4 py-2 rounded shadow transition"
        type="button"
      >
        Delete Note
      </button>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');
