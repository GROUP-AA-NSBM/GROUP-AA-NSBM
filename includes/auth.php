<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function requireLogin() {
    if (!isLoggedIn()) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'] ?? '/GROUP-AA-NSBM/student/register-event.php';
        header("Location: /GROUP-AA-NSBM/auth/login.php");
        exit;
    }
}
?>
