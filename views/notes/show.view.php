<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>


<main>
    <h1><?= htmlspecialchars($note['body'] ?? 'Note not found') ?></h1>

    <!-- Delete form -->
    <form method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button type="submit" class="text-red-500 text-sm mt-2">Delete</button>
    </form>

    <!-- Back копче -->
    <p>
        <a href="/notes" style="color: blue; text-decoration: underline;">&larr; Go Back</a>
    </p>
</main>

<?php
require basePath('views/partials/footer.php');
?>
