<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>


<main>
    <h1><?= htmlspecialchars($note['body'] ?? 'Note not found') ?></h1>

    <!-- Back копче -->
    <p>
        <a href="/notes" style="color: blue; text-decoration: underline;">&larr; Go Back</a>
    </p>
</main>

<?php
require basePath('views/partials/footer.php');
?>
