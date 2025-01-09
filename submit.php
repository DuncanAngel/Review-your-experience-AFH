<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstname = $_POST['inputfirstname'];
    $lastname = $_POST['inputlastname'];
    $email = $_POST['inputemail'];
    $message = $_POST['inputmessage'];
    $category = $_POST['inputcategory'];

    try {
        $sql = "INSERT INTO userreviews (firstname, lastname, email, content, category) VALUES (:firstname, :lastname, :email, :content, :category)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':content', $message, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: review.php");
        exit;
    } catch (PDOException $e) {
        header("Location: review.php");
        exit;
    }
} else {
    header("Location: review.php");
    exit;
}

