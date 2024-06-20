<?php
require 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (login($email, $password)) {
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Login failed. Please check your email and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h2>Login</h2>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
       
    </footer>
</body>
</html>
