<?php
$query = $pdo->prepare("SELECT * FROM category");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person,shopping_cart" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<nav class="navbar navbar-expand bg-black">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/angels_from_hell-textlogo-white.png" alt="logo" width="150" height="75">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $category): ?>
                            <li><a class="dropdown-item"
                                    href="clothes.php?cat-id=<?= $category["id"] ?>"><?= $category["name"] ?></a></li>
                        <?php endforeach ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="review.php">Review your experience</a></li>
                        <li><a class="dropdown-item" href="faq.php">FAQ</a></li>
                    </ul>
                </li>
            </ul>
            <a class="btn text-light" href="account-login.php"><span class="material-symbols-outlined">
                    person
                </span></a>
            <a href="cart.php" class="btn text-light">
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
            </a>
            <div class="cart-nmbr"></div>
        </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>