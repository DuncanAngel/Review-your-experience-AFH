<?php
require_once 'db.php';
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Angels From Hell</title>
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-black">
<?php include "resources/header.php"; ?>
<div class="parallax"></div>
<div class="paragraph-one">
    <h2 class="title">Angels From Hell</h2>
    <article class="content">
        <h3>Our story</h3>
        <p>
            This isn’t just clothing—it’s a way of life. Inspired by Marshall Crews, our brand was born from a love of skater culture and the streets we call home.
            Every hoodie, pair of wide jeans, and t-shirt we design is made for those who move through life with confidence,
            creativity, and a style that speaks louder than words.
            But looking good isn’t enough. Our mission is to bring you clothes that don’t just turn heads but also make a difference.
            That’s why every piece we create is sustainably made—because the planet deserves as much love as the streets we skate.
            It’s more than a brand. It’s a movement. Are you in?
        </p>
    </article>
</div>

<?php include "resources/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
if (!is_dir('uploads')) {
    mkdir('uploads', 0755, true);
}
chmod('uploads', 0755);

if (is_writable('uploads')) {
    echo "Uploads directory is writable.";
} else {
    echo "Failed to set permissions on uploads directory.";
}
?>