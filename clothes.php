<?php
require_once 'db.php';
global $pdo;

$id = filter_input(INPUT_GET, 'cat-id', FILTER_VALIDATE_INT);

// Query to fetch clothing data with category name
if ($id) {
    $query = $pdo->prepare("
    SELECT clothing.id, clothing.name, clothing.image, clothing.price, clothing.categoryId, category.name AS categoryName
   FROM clothing
   JOIN category ON clothing.categoryId = category.id
   WHERE clothing.categoryID = :id
 ");
 $query->bindParam("id", $id);
} else {
    die("Error: Id is not correct!");
}

$query->execute();
$clothes = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="css/clothes.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body class="bg-dark-subtle">
        <?php include("Resources/header.php"); ?>
        <div class="container my-4">
            <div class="row">
                <?php if (count($clothes) > 0): ?>
                    <?php foreach ($clothes as $clothing): ?>
                            <div class="card card-mine container-mine">
                                <div style="width: 18rem;">
                                    <a href="#"><img src="<?= $clothing['image'] ?>" class="card-img-top"
                                            alt="<?= $clothing['name'] ?>"></a>
                                </div>
                                <p class="card-text "><?= $clothing['name'] ?></p>
                            </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No clothing items found.</p>
                <?php endif; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>

    </html>