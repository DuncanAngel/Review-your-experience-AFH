<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $orderNumber = $_POST["order-number"];
    $email = $_POST["email"];
    $message = $_POST["message"];
}

function printMessage($firstName, $lastName, $orderNumber, $email, $message) {
    echo "Success! Your message has been sent. We will get back to you as soon as possible.<br>";
    echo "<strong>Your message:</strong><br>
          <strong>First Name:</strong> $firstName<br>
          <strong>Last Name:</strong> $lastName<br>
          <strong>Order Number:</strong> $orderNumber<br>
          <strong>Email:</strong> $email<br>
          <strong>Message:</strong> $message";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <input required type="text" name="first-name" placeholder="First name"><br>
    <input required type="text" name="last-name" placeholder="Last name"><br>
    <input type="number" name="order-number" placeholder="Order number"><br>
    <input type="email" name="email" placeholder="E-mail"><br>
    <input type="text" name="message" placeholder="Add message..."><br>
    <button name="submit">Submit</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
printMessage($firstName, $lastName, $orderNumber, $email, $message);
?>