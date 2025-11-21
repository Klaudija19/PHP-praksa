<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Note</title>
    <style>
        form {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #555;
        }
    </style>
</head>
<body>

<h1 style="text-align:center;">Edit Note</h1>

<form action="/notes/update" method="POST">
    <!-- Hidden field за ID -->
    <input type="hidden" name="id" value="<?= $note['id'] ?? '' ?>">

    <label>Body:</label>
    <textarea name="body" required><?= htmlspecialchars($note['body'] ?? '') ?></textarea>

    <button type="submit">Update</button>
</form>

<div style="text-align:center;">
    <a href="/notes">Back to notes</a>
</div>

</body>
</html>



















