<?php
global $pdo;
$query = $pdo->prepare("SELECT * FROM category");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/openart-image_nnevPETh_1732727425807_raw.jpg" alt="logo" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" role="button" data-bs-toggle="dropdown"
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
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
</nav>