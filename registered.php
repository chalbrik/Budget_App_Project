<?php
session_start();

unset($_SESSION['remember_username']);
unset($_SESSION['remember_email']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registered</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <main>
        <span>Congratulations! You have been successfuly registered.</span><br/>
        <a href="./index.php">Back to main page</a>
    </main>
</body>
</html>