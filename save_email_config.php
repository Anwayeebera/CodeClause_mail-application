<?php
require 'auth.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = $_POST['host'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_id = get_current_user_id();

    $stmt = $pdo->prepare('INSERT INTO email_configs (user_id, host, port, username, password) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE host=?, port=?, username=?, password=?');
    if ($stmt->execute([$user_id, $host, $port, $username, $password, $host, $port, $username, $password])) {
        header('Location: dashboard.php');
    } else {
        echo "Error: Could not save configuration";
    }
}
?>
