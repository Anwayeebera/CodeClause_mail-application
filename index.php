<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Application</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="navbar">
    <img src="mailicon.png" alt="Mail Icon" class="mail-icon">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    <a href="register.php"><i class="fas fa-user-plus"></i> Register</a>
    <a href="compose_email.php"><i class="fas fa-envelope"></i> Compose Email</a>
    </div>
    <div class="container">
        <h2>Welcome to the Mail Application</h2>
        <p>This is your go-to application for sending and managing emails.</p>
    </div>
</body>
</html>
