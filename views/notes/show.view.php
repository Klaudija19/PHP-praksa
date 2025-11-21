<?php require basePath("views/partials/head.php"); ?>
<?php require basePath("views/partials/nav.php"); ?>
<?php require basePath("views/partials/banner.php"); ?>

<h2>Note Details</h2>

<p><?= htmlspecialchars($note['body']) ?></p>

<a href="/notes">Back</a>
<a href="/note/edit/<?= $note['id'] ?>">Edit</a>

<form method="POST" action="/notes/delete" style="display:inline;">
    <input type="hidden" name="id" value="<?= $note['id'] ?>">
    <button>Delete</button>
</form>

<?php require basePath("views/partials/footer.php"); ?>
