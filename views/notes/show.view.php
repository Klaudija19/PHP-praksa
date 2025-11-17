<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>


<main>
    <h1><?= htmlspecialchars($note['body'] ?? 'Note not found') ?></h1>

    <!-- Edit link -->
    <p>
        <a href="/note/edit?id=<?= $note['id'] ?>" style="color: blue; text-decoration: underline;">Edit</a>
    </p>

    <!-- Delete form -->
    <form method="POST" action="/note/<?= $note['id'] ?>">
        <input type="hidden" name="_method" value="DELETE">
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
