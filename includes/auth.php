<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_URL')) {
    $is_subfolder = (strpos($_SERVER['REQUEST_URI'] ?? '', '/GROUP-AA-NSBM') !== false);
    define('BASE_URL', $is_subfolder ? '/GROUP-AA-NSBM' : '');
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
        header("Location: " . BASE_URL . "/auth/login.php");
        exit;
    }
}

function requireAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: /GROUP-AA-NSBM/auth/login.php");
        header("Location: " . BASE_URL . "/auth/login.php");
        exit;
    }
}
?>
