<?php
$host = 'localhost';
$db = 'angelsfromhell';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tableCheck = $pdo->query("SHOW TABLES LIKE 'userreviews'");

    if ($tableCheck->rowCount() == 0) {
        $createTableQuery = "
            CREATE TABLE userreviews (
                id INT AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                date_rev TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $pdo->exec($createTableQuery);
    } else {
        header("Location: index.php");
    }

} catch (PDOException $e) {
    die("Database connection or query failed: " . $e->getMessage());
}
?>