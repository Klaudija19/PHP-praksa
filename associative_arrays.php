<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>

</head>
<body>
<?php
$books = [
[
"name" => "Do Androids Dream of Electric Sheep?",
"author" => "Philip K. Dick",
"purchaseUrl" => "https://example.com/androids-dream"
],
[
"name" => "Project Hail Mary",
"author" => "Andy Weir",
"purchaseUrl" => "https://example.com/hail-mary"
]
];
?>

<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <?= $book['name'] ?> by <?= $book['author'] ?>
            <a href="<?= $book['purchaseUrl'] ?>">Buy here</a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>