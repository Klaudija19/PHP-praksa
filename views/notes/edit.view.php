<?php require basePath("views/partials/head.php"); ?>
<?php require basePath("views/partials/nav.php"); ?>
<?php require basePath("views/partials/banner.php"); ?>

<h2>Edit Note</h2>

<form method="POST" action="/note/<?= $note['id'] ?>">
    <input type="hidden" name="_method" value="PATCH">

    <textarea name="body"><?= htmlspecialchars($note['body']) ?></textarea>

    <button type="submit">Update</button>
</form>

<?php require basePath("views/partials/footer.php"); ?>
















