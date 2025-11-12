<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main>
    <h1><?= htmlspecialchars($note['body'] ?? 'Note not found') ?></h1>

    <!-- Back копче -->
    <p>
        <a href="/notes" style="color: blue; text-decoration: underline;">&larr; Go Back</a>
    </p>
</main>

<?php require('partials/footer.php') ?>
