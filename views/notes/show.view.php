<?php
require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/nav.php';
require_once __DIR__ . '/../partials/banner.php';
?>


<main>
    <h1><?= htmlspecialchars($note['body'] ?? 'Note not found') ?></h1>

    <!-- Back копче -->
    <p>
        <a href="/notes" style="color: blue; text-decoration: underline;">&larr; Go Back</a>
    </p>
</main>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>
