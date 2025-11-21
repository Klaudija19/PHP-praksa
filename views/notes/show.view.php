<?php require basePath("views/partials/head.php"); ?>
<?php require basePath("views/partials/nav.php"); ?>
<?php
$noteTitle = trim($note['body']);
if ($noteTitle === '') {
    $displayTitle = 'Untitled Note';
} elseif (function_exists('mb_strimwidth')) {
    $displayTitle = mb_strimwidth($noteTitle, 0, 60, '...');
} else {
    $displayTitle = strlen($noteTitle) > 60 ? substr($noteTitle, 0, 57) . '...' : $noteTitle;
}
?>

<main class="bg-gray-200 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg p-8 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <p class="text-sm text-gray-500">Note #<?= htmlspecialchars($note['id']) ?></p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">
                        <?= htmlspecialchars($displayTitle) ?>
                    </h2>
                </div>

                <div class="flex gap-3">
                    <a href="/note/edit/<?= $note['id'] ?>" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Edit
                    </a>
                    <form method="POST" action="/notes/delete">
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                        <button type="submit" class="px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="prose max-w-none text-gray-800 leading-relaxed">
                <?= nl2br(htmlspecialchars($note['body'])) ?>
            </div>

            <div class="mt-8">
                <a href="/notes" class="text-purple-600 hover:text-purple-700 font-semibold">
                    ← Back to Notes
                </a>
            </div>
        </div>
    </div>
</main>

<?php require basePath("views/partials/footer.php"); ?>
