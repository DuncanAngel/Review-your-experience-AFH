<?php
$query = $pdo->prepare("SELECT * FROM category");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />

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
            <a class="btn text-light" href="account-login.php"><span class="material-symbols-outlined">
                    person
                </span></a>
        </div>
</nav>