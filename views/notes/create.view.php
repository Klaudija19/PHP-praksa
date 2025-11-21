<?php require base_path("views/partials/header.php"); ?>

<h2>Create a New Note</h2>

<form method="POST" action="/notes">

    <label for="body">Your Note:</label><br>
    <textarea name="body" id="body" rows="6" style="width: 100%;"><?= $body ?? '' ?></textarea>

    <?php if (!empty($errors['body'])): ?>
        <p style="color: red;"><?= $errors['body'] ?></p>
    <?php endif; ?>

    <button type="submit" style="margin-top:10px;">Save Note</button>
</form>

<?php require base_path("views/partials/footer.php"); ?>







