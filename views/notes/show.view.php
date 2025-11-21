<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Note</title>
    <style>
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        p {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Note Details</h1>

    <p><?= htmlspecialchars($note['body']) ?></p>

    <div style="text-align:center; margin-top:20px;">
        <a href="/notes">Back to notes</a>
        <a href="/note/edit/<?= $note['id'] ?>">Edit</a>
        <form action="/notes/delete" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; cursor:pointer;">Delete</button>
        </form>
    </div>
</div>

</body>
</html>
