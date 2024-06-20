<?php
session_start();
require 'db.php';

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit();
    }
}

function get_current_user_id() {
    return $_SESSION['user_id'] ?? null;
}

function login($email, $password) {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }

    return false;
}

function register($email, $password) {
    global $pdo;

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
    return $stmt->execute([$email, $password_hash]);
}

function logout() {
    session_destroy();
}
