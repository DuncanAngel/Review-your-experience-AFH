<?php
require_once 'db.php';
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
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstname = $_POST['inputfirstname'];
    $lastname = $_POST['inputlastname'];
    $email = $_POST['inputemail'];
    $message = $_POST['inputmessage'];
    $clothingId = $_POST['inputClothingId'];

    try {
        $sql = "INSERT INTO userreviews (firstname, lastname, email, content, clothingId) VALUES (:firstname, :lastname, :email, :content, :clothingId)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':content', $message, PDO::PARAM_STR);
        $stmt->bindParam(':clothingId', $clothingId, PDO::PARAM_STR);

        $stmt->execute();
        echo "<p class='text-white'>Your review has been sent!</p>";
        header("Location: review.php");
        exit;
    } catch (PDOException $e) {
        header("Location: review.php");
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review</title>
    <link rel="stylesheet" href="css/review.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black">
    <?php include "resources/header.php"; ?>
    <div class="container d-flex justify-content-center">
        <form method="POST" class="row g-1 w-50">
            <div class="col-md-6 mt-5">
                <label for="inputfirstname" class="form-label text-white">First name</label>
                <input type="text" class="form-control" name="inputfirstname" placeholder="John">
            </div>
            <div class="col-md-6 mt-5">
                <label for="inputlastname" class="form-label text-white">Last name</label>
                <input type="text" class="form-control" name="inputlastname" placeholder="Johanson">
            </div>
            <div class="col-12">
                <label for="inputemail" class="form-label text-white">E-mail</label>
                <input type="email" class="form-control" name="inputemail" placeholder="name@example.com">
            </div>
            <div class="col-12">
                <label for="inputmessage" class="form-label text-white">Message</label>
                <textarea type="text" class="form-control" name="inputmessage" placeholder="e.g. 'Great service!'"
                    style="height: 100px;"></textarea>
            </div>
            <div class="col-md-2">
                <label for="inputcategory" class="form-label text-white">Category</label>
                <select id="inputcategory" class="form-select" name="inputcategory">
                    <option selected disabled>Choose...</option>
                    <?php foreach ($clothes as $clothingId): ?>
                        <option class="dropdown-item"><?= $clothes["name"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <button type="submit btn" name="submit" class="btn btn-secondary text-white">Send review</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
<?php include "resources/footer.php"; ?>
</html>