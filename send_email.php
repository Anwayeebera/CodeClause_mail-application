<?php
require 'auth.php';
require_login();
require 'db.php';
require 'vendor/autoload.php';  // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form data is complete
    if (!isset($_POST['recipient']) || !isset($_POST['subject']) || !isset($_POST['body'])) {
        echo "Form data is incomplete.";
        exit();
    }

    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $user_id = get_current_user_id();

    // Fetch SMTP configuration
    $stmt = $pdo->prepare('SELECT * FROM email_configs WHERE user_id = ?');
    $stmt->execute([$user_id]);
    $config = $stmt->fetch();

    if ($config) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = $config['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['username'];
            $mail->Password = 'wqum pxyl bjlx mexj'; // Use the app-specific password here
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $config['port'];

            // Recipients
            $mail->setFrom($config['username'], 'Mailer');
            $mail->addAddress($recipient);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();

            // Save sent email to database
            $stmt = $pdo->prepare('INSERT INTO sent_emails (user_id, recipient, subject, body) VALUES (?, ?, ?, ?)');
            $stmt->execute([$user_id, $recipient, $subject, $body]);

            header('Location: sent_emails.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "SMTP configuration not found.";
    }
}
