<?php
$host = 'localhost';
$db   = 'angelsfromhell';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Establish PDO connection
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the 'userreview' table exists
    $tableCheck = $pdo->query("SHOW TABLES LIKE 'userreviews'");
    
    if ($tableCheck->rowCount() == 0) {
        // Table doesn't exist, create it
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
        $pdo->exec($createTableQuery);  // Execute the table creation query
        echo "Table 'userreview' created successfully.<br>";
    } else {
        echo "Table 'userreview' already exists.<br>";
    }

} catch (PDOException $e) {
    die("Database connection or query failed: " . $e->getMessage());
}
?>
