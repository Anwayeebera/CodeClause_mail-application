<?php
require 'auth.php';
require_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="navbar">
    <img src="mailicon.png" alt="Mail Icon" class="mail-icon">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <a href="email_config.php"><i class="fas fa-cog"></i> Configure Email</a>
    <a href="compose_email.php"><i class="fas fa-edit"></i> Compose Email</a>
    <a href="sent_emails.php"><i class="fas fa-paper-plane"></i> Sent Emails</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="container">
        <h1>Dashboard</h1>
        <div class="dashboard-links">
            <a href="email_config.php">Configure Email</a>
            <a href="compose_email.php">Compose Email</a>
            <a href="sent_emails.php">Sent Emails</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        <p>This email was sent from Your Company. <br>Please do not reply to this email.</p>
    </footer>
</body>
</html>
