<?php require basePath("views/partials/head.php"); ?>
<?php require basePath("views/partials/nav.php"); ?>

<main class="bg-gray-200 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        
        <h2 class="text-3xl font-bold mb-6 text-gray-800"><?= $heading ?? 'Your Notes' ?></h2>

        <a href="/notes/create" class="inline-block accent-bg text-white px-6 py-3 rounded-lg mb-6 hover:bg-purple-700 transition">
            Create New Note
        </a>

        <?php if (empty($notes)): ?>
            <div class="bg-white rounded-lg p-8 text-center">
                <p class="text-gray-600 text-lg">No notes yet. Create your first note!</p>
            </div>
        <?php else: ?>
            <div class="grid gap-4">
                <?php foreach ($notes as $note): ?>
                    <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <p class="text-gray-800 mb-4 text-lg"><?= htmlspecialchars($note['body']) ?></p>

                        <div class="flex gap-4 items-center">
                            <a href="/note/<?= $note['id'] ?>" class="text-purple-600 hover:text-purple-700 font-semibold">
                                View
                            </a>
                            <a href="/note/edit/<?= $note['id'] ?>" class="text-blue-600 hover:text-blue-700 font-semibold">
                                Edit
                            </a>

                            <form method="POST" action="/notes/delete" class="inline-block">
                                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                                <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php require basePath("views/partials/footer.php"); ?>

