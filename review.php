<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
}

function printMessage($firstName, $lastName, $email, $message) {
    echo "Success! Your message has been sent. We will get back to you as soon as possible.<br>";
    echo "<strong>Your message:</strong><br>
          <strong>First Name:</strong> $firstName<br>
          <strong>Last Name:</strong> $lastName<br>
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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/openart-image_nnevPETh_1732727425807_raw.jpg" alt="logo" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="review.php">Review</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
            <div class="bg-dark p-4">
                <h5 class="text-body-emphasis h4">Collapsed content</h5>
                <span class="text-body-secondary">Toggleable via the navbar brand.</span>
            </div>
        </div>
    </div>
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
        <div class="bg-dark p-4">
            <h5 class="text-body-emphasis h4">Collapsed content</h5>
            <span class="text-body-secondary">Toggleable via the navbar brand.</span>
        </div>
    </div>
</nav>

<form method="post" class="wrapper">
    <div class="form-floating">
        <input type="text" class="form-control" name="first-name" id="floatingInput" placeholder="Duncan">
        <label for="floatingInput">First name</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" name="last-name" id="floatingInput" placeholder="Jansen">
        <label for="floatingInput">Last name</label>
    </div>
    <div class="form-floating">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    <div>
        <textarea class="form-floating" id="textArea" name="message" rows="3" placeholder="Add message..."></textarea>
    </div>
    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
//if (isset($_POST['submit'])) {
//    printMessage($firstName, $lastName, $orderNumber, $email, $message);
//}
//?>