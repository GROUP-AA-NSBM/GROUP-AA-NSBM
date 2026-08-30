<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = 1;
        $_SESSION['user_email'] = $email;

        $redirectUrl = $_SESSION['redirect_url'] ?? '/GROUP-AA-NSBM/student/register-event.php';
        unset($_SESSION['redirect_url']);
        
        header("Location: " . $redirectUrl);
        exit;
    }
}

header("Location: /GROUP-AA-NSBM/auth/login.php");
exit;
?>
