<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        $sql = "INSERT INTO userreview (firstname, lastname, email, content) VALUES (:firstname, :lastname, :email, :content)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':content', $message, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: review.php");
        exit;
    } catch (PDOException $e) {
        header("Location: review.php");
        exit;
    }
}  else {
    header("Location: review.php");
    exit;
}
