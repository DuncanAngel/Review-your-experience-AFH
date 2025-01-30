<?php
require_once 'db.php';
global $pdo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php include("Resources/header.php"); ?>

<div class="container d-flex flex-column justify-content-center align-items-center mt-3 ">
    <p class="user-select-auto">Frequently asked questions</p>
    <div class="items d-flex row row-cols-4 justify-content-center">
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>

        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
        <div class="card col text-bg-dark mb-3 me-3" style="max-width: 18rem;">
            <div class="card-body">
                <div class="card-title fw-bold">Who are you?</div>
                <p class="card-text">Sigma sigma boy sigma boy sigma boy.</p>
            </div>
        </div>
    </div>
</div>
<?php include "resources/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>