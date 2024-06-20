<?php
require 'auth.php';
require_login();
require 'db.php';

$user_id = get_current_user_id();
$stmt = $pdo->prepare('SELECT * FROM sent_emails WHERE user_id = ? ORDER BY sent_at DESC');
$stmt->execute([$user_id]);
$emails = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent Emails</title>
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
        <h2>Sent Emails</h2>
        <ul class="email-list">
            <?php foreach ($emails as $email): ?>
                <li>
                    <strong>To:</strong> <?= htmlspecialchars($email['recipient']); ?><br>
                    <strong>Subject:</strong> <?= htmlspecialchars($email['subject']); ?><br>
                    <strong>Sent At:</strong> <?= htmlspecialchars($email['sent_at']); ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        <p>This email was sent from Your Company. <br>Please do not reply to this email.</p>
    </footer>
</body>
</html>
