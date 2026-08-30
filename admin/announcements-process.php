<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title   = trim($_POST['title'] ?? '');
    $message = trim($_POST['content'] ?? '');

    if (!empty($title) && !empty($message)) {
        $stmt = $pdo->prepare('INSERT INTO announcements (title, message) VALUES (?, ?)');
        $stmt->execute([$title, $message]);
        header('Location: announcements.php?status=created');
        exit;
    }
}

header('Location: announcements.php?error=empty');
exit;
?>