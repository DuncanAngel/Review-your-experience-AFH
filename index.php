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
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="first-name" id="floatingInput" placeholder="Duncan">
        <label for="floatingInput">First name</label>
    </div><br>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="last-name" id="floatingInput" placeholder="Jansen">
        <label for="floatingInput">Last name</label>
    </div><br>
    <input type="number" name="order-number" placeholder="Order number"><br>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div><br>
    <div class="mb-3">
        <label for="textArea" class="form-label">Add message...</label>
        <textarea class="form-control" id="textArea" name="message" rows="3"></textarea>
    </div><br>
    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    printMessage($firstName, $lastName, $orderNumber, $email, $message);
}

?>