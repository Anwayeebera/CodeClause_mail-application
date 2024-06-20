<?php
require 'auth.php';
require_login();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = $_POST['host'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_id = get_current_user_id();

    $stmt = $pdo->prepare('INSERT INTO email_configs (user_id, host, port, username, password) VALUES (?, ?, ?, ?, ?)
                           ON DUPLICATE KEY UPDATE host=?, port=?, username=?, password=?');
    $stmt->execute([$user_id, $host, $port, $username, $password, $host, $port, $username, $password]);

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Configuration</title>
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
        <h2>Email Configuration</h2>
        <form method="post">
            <input type="text" name="host" placeholder="SMTP Host" required>
            <input type="text" name="port" placeholder="SMTP Port" required>
            <input type="text" name="username" placeholder="SMTP Username" required>
            <input type="password" name="password" placeholder="SMTP Password" required>
            <button type="submit">Save Configuration</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        <p>This email was sent from Your Company. <br>Please do not reply to this email.</p>
    </footer>
</body>
</html>
