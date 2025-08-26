<?php
ob_start();
?>
<div class="flex justify-end mb-6">
  <a href="/note/create" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold px-4 py-2 rounded shadow transition">
    + Create Note
  </a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
  <?php foreach ($notes as $note): ?>
    <div class="bg-gray-800 rounded-lg shadow p-6 flex flex-col justify-between">
      <div>
        <h2 class="text-lg font-semibold text-indigo-400 mb-2"><?= htmlspecialchars($note['title']) ?></h2>
        <p class="text-gray-300 mb-4"><?= htmlspecialchars(mb_strimwidth($note['content'], 0, 100, '...')) ?></p>
      </div>
      <a href="/note?id=<?= $note['note_id'] ?>" class="mt-2 inline-block text-indigo-400 hover:underline">View Note</a>
    </div>
  <?php endforeach; ?>
</div>
<?php
$content = ob_get_clean();
include base_path('views/layout.php');

