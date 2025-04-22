<?php
session_start();

$valid_email = "admin@e-mail.hu";
$valid_password = "1234";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION["logged_in"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Who is your bias? | Login</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap" 
        rel="stylesheet">
    </head>
    <body>
        <img src="img/bias_logo.png" alt="logo" height="600">

        <?php if ($error): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>E-mail:<br> <input type="email" name="email" required></label>
            <label>Password:<br> <input type="password" name="password" required></label><br>
            <button type="submit">Login</button>
        </form>
    </body>
</html>