<?php
require_once 'db.php';
global $pdo;
session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: account-login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angels From Hell</title>
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black ">
    <?php include "resources/header.php"; ?>



    <div class="form-container d-flex justify-content-center mt-5">
        <div class="d-flex flex-column flex-md-row w-100 w-md-50 justify-content-center">
            <ul class="nav flex-column nav-pills me-md-4 mb-4 mb-md-0 w-md-25 gap-3" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order" type="button" role="tab" aria-controls="order" aria-selected="true">
                        Orders
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="acc-info-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">
                        Account Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">
                        Review
                    </button>
                </li>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </ul>

            <div class="tab-content w-50" id="authTabsContent">
                <div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
                    ORDERS
                </div>

                <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="acc-info-tab">
                    ACCOUNT INFORMATION
                </div>

                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                   REVIEWS USER HAS SUBMITTED
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>