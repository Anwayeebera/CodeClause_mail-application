<?php
require 'auth.php';
require_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose Email</title>
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
        <h2>Compose Email</h2>
        <form method="post" action="send_email.php">
            <input type="text" name="recipient" placeholder="Recipient Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="body" placeholder="Email Body" required></textarea>
            <button type="submit">Send Email</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        <p>This email was sent from Your Company. <br>Please do not reply to this email.</p>
    </footer>
</body>
</html>
