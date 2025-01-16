<?php
require_once 'db.php';
global $pdo;
session_start();

if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] === true) {
    header('Location: account.php'); 
    exit;
}

$tableCheck = $pdo->query("SHOW TABLES LIKE 'accounts'");
if ($tableCheck->rowCount() == 0) {
    $createTableQuery = "
        CREATE TABLE accounts (
            username VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL,
            role VARCHAR(25) NOT NULL,
            join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            password VARCHAR(255) NOT NULL
        )
    ";
    $pdo->exec($createTableQuery);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login-submit'])) {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    try {
        $stmt = $pdo->prepare('SELECT * FROM accounts WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];     
                $_SESSION['logged_in'] = true;
                header('Location: account.php');
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
    } catch (PDOException $e) {
        die("An error occurred: " . $e->getMessage());
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup-submit'])) {
    $username = $_POST['signup-username'];
    $email = $_POST['signup-email'];
    $password = $_POST['signup-password'];

    try {
        $role = 'user';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO accounts (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: account-login.php");
        exit;
    } catch (PDOException $e) {
        $error = "Something went wrong. Please try again later.";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Angels From Hell</title>
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black">
    <?php include "resources/header.php"; ?>

    <div class="form-container d-flex justify-content-center">
        <div class="tab-content p-4 w-50" id="authTabsContent">
            <ul class="nav nav-pills justify-content-center mb-4" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">
                        Login
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">
                        Create Account
                    </button>
                </li>
            </ul>

            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form method="POST">
                    <div class="mb-3">
                        <label for="login-email" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" name="login-email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" name="login-password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" name="login-submit" class="btn btn-secondary w-100">Login</button>
                </form>
            </div>

            <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                <form method="POST">
                    <div class="mb-3">
                        <label for="signup-username" class="form-label text-light">Username</label>
                        <input type="text" class="form-control" name="signup-username" name="signup-username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-email" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" name="signup-email" name="signup-email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-password" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" name="signup-password" name="signup-password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" name="signup-submit" class="btn btn-secondary w-100">Create Account</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>