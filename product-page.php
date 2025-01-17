<?php
require_once 'db.php';
require 'modules/functions.php';
global $pdo;

$clothingId = $_GET['id'];

// Query to fetch clothing data with category name
if ($clothingId) {
    $query = $pdo->prepare("SELECT * FROM clothing WHERE id= :id");
    $query->bindParam("id", $id);
} else {
    die("Error: Id is not correct!");
}

$query->execute();
$clothes = $query->fetch(PDO::FETCH_ASSOC);
$clothing = getPiece($clothingId);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $clothing['name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .cart-nmbr {
            position: absolute;
            display: none;
            top: 2.9em;
            color: white;
            right: 1.2em;
        }
    </style>
</head>

<body class="bg-black">
    <?php include "resources/header.php"; ?>
    <?php
    if (is_array($clothing) && isset($clothing['image'], $clothing['name'], $clothing['price'], $clothing['description'], $clothing['material'])) {
    ?>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= $clothing['image'] ?>" class="img-fluid" alt="<?= htmlspecialchars($clothing['name']) ?>"
                        style="max-width: 500px;">
                </div>
                <div class="col-md-6">
                    <h2 class="card-title text-white"><?= htmlspecialchars($clothing['name']) ?></h2>
                    <p class="card-text text-white"><strong>Price:</strong> €<?= htmlspecialchars($clothing['price']) ?></p>
                    <p class="card-text text-white"><strong>Description:</strong> <?= htmlspecialchars($clothing['description']) ?></p>
                    <p class="card-text text-white"><strong>Material:</strong> <?= htmlspecialchars($clothing['material']) ?></p>
                    <!-- Add to Cart Button -->
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($clothing['id']) ?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($clothing['name']) ?>">
                        <input type="hidden" name="product_price" value="<?= htmlspecialchars($clothing['price']) ?>">
                        <button class="btn btn-light mt-3">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo '<p>Error: Product information is not available.</p>';
    }
    ?>
    <script>
        const cart = document.querySelector('.cart-nmbr');
        let cartAmount = 0;
        const addBtn = document.querySelector('.btn-light').addEventListener('click', (event) => {
            cartAmount++;
            if (cartAmount != 0) {
                cart.style.display = "block";
            }
            cart.innerHTML = cartAmount;
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>