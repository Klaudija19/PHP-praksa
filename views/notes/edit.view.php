<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <h1 class="text-xl font-bold mb-4">Edit Note</h1>

        <form method="POST" action="/update">
            <!-- Скриено поле за ID на белешката -->
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <!-- Текстуално поле за уредување -->
            <textarea
                    name="body"
                    class="w-full border rounded p-2"
                    rows="5"
            ><?= htmlspecialchars($note['body']) ?></textarea>

            <div class="mt-4 flex gap-2">
                <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Update
                </button>

                <a href="/notes" class="text-gray-500 underline">Cancel</a>
            </div>
        </form>

    </div>
</main>

<?php
require basePath('views/partials/footer.php');
?>











