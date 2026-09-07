<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /GROUP-AA-NSBM/auth/login.php");
        exit;
    }
}

function requireAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: /GROUP-AA-NSBM/admin/login.php");
        exit;
    }
}
?>
