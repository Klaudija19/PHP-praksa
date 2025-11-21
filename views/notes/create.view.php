<?php require basePath("views/partials/head.php"); ?>
<?php require basePath("views/partials/nav.php"); ?>
<?php $errors = $errors ?? []; ?>

<main class="bg-gray-200 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg p-8 shadow-sm">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Create a New Note</h2>

            <form method="POST" action="/notes" class="space-y-4">
                <label class="block text-gray-700 font-semibold">Your Note</label>
                <textarea
                        name="body"
                        rows="8"
                        class="w-full border-2 border-gray-300 rounded-lg p-4 focus:outline-none focus:border-purple-600 transition"
                        placeholder="Write anything that's on your mind..."><?= htmlspecialchars($body ?? '') ?></textarea>

                <?php if (!empty($errors['body'])): ?>
                    <p class="text-red-500 text-sm"><?= htmlspecialchars($errors['body']) ?></p>
                <?php endif; ?>

                <div class="flex gap-4">
                    <button type="submit" class="accent-bg text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition">
                        Save Note
                    </button>
                    <a href="/notes" class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require basePath("views/partials/footer.php"); ?>







