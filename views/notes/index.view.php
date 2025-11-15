<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Листа на белешки -->
        <ul class="mb-6">
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Линк за Create Note -->
        <p>
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>

    </div>
</main>

<?php
require basePath('views/partials/footer.php');
?>

