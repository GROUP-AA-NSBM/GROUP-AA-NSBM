<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND role = "admin" LIMIT 1');
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['logged_in']  = true;
            $_SESSION['user_id']    = $admin['user_id'];
            $_SESSION['user_name']  = $admin['full_name'];
            $_SESSION['user_email'] = $admin['email'];
            $_SESSION['role']       = 'admin';

            header('Location: /GROUP-AA-NSBM/admin/dashboard.php');
            exit;
        }
    }
}

header('Location: /GROUP-AA-NSBM/admin/login.php?error=invalid_credentials');
exit;
?>