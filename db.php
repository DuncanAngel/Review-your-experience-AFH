<?php
$host = 'localhost';
$db   = 'angelsfromhell';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

try {
    // Create connection to MySQL server without selecting the database
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the database exists
    $query = $pdo->query("SHOW DATABASES LIKE '$db'");
    if ($query->rowCount() == 0) {
        // If the database doesn't exist, create it
        $pdo->exec("CREATE DATABASE $db");
        echo "Database '$db' created successfully.<br>";
    }

    // Now connect to the specific database
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    echo "Connected to the '$db' database.<br>";

    // Check if the 'userreview' table exists
    $tableCheck = $pdo->query("SHOW TABLES LIKE 'userreview'");
    if ($tableCheck->rowCount() == 0) {
        // Create the table if it doesn't exist
        $createTableQuery = "
            CREATE TABLE userreview (
                id INT AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                date_rev TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $pdo->exec($createTableQuery);
        echo "Table 'userreview' created successfully.";
    } else {
        echo "Table 'userreview' already exists.";
    }
} catch (PDOException $e) {
    die("Database connection or query failed: " . $e->getMessage());
}
?>
