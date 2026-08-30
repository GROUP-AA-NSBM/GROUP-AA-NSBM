<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function isAdmin() {
    return isLoggedIn() && isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'] ?? '/GROUP-AA-NSBM/index.php';
        header("Location: /GROUP-AA-NSBM/auth/login.php");
        exit;
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header("Location: /GROUP-AA-NSBM/admin/login.php");
        exit;
    }
}
?>
