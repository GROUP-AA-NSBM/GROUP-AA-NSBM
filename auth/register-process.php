<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['Uname'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Check if email already exists
        $checkStmt = $pdo->prepare('SELECT user_id FROM users WHERE email = ? LIMIT 1');
        $checkStmt->execute([$email]);

        if ($checkStmt->fetch()) {
            header('Location: /GROUP-AA-NSBM/auth/register.php?error=email_exists');
            exit;
        }

        // Hash password and insert student
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertStmt = $pdo->prepare('INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, "student")');
        $insertStmt->execute([$name, $email, $hashedPassword]);

        $newUserId = $pdo->lastInsertId();

        $_SESSION['logged_in']  = true;
        $_SESSION['user_id']    = $newUserId;
        $_SESSION['user_name']  = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['role']       = 'student';

        header('Location: /GROUP-AA-NSBM/index.php');
        exit;
    }
}

header('Location: /GROUP-AA-NSBM/auth/register.php?error=empty_fields');
exit;
?>