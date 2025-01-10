<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'angelsfromhell';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $price = $conn->real_escape_string($_POST['price']);
    $categoryId = $conn->real_escape_string($_POST['categoryId']);

    // Handle file upload
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // Insert data into database
        $sql = "INSERT INTO clothing (name, price, image, categoryId) VALUES ('$name', '$price', '$imagePath', '$categoryId')";
        if ($conn->query($sql) === TRUE) {
            echo "New clothing item added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>