<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: /GROUP-AA-NSBM/admin/dashboard.php");
                exit;
            }

            $redirectUrl = $_SESSION['redirect_url'] ?? '/GROUP-AA-NSBM/index.php';
            unset($_SESSION['redirect_url']);
            
            header("Location: " . $redirectUrl);
            exit;
        }
    }
}

header("Location: /GROUP-AA-NSBM/auth/login.php?error=invalid_credentials");
exit;
?>
