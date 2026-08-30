<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if (isset($_GET['id'])) {
    $annId = intval($_GET['id']);
    if ($annId > 0) {
        $stmt = $pdo->prepare('DELETE FROM announcements WHERE announcement_id = ?');
        $stmt->execute([$annId]);
    }
}

header('Location: announcements.php?status=deleted');
exit;
?>