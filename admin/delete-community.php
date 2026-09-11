<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if (isset($_GET['id'])) {
    $comId = intval($_GET['id']);
    if ($comId > 0) {
        $stmt = $pdo->prepare('DELETE FROM communities WHERE community_id = ?');
        $stmt->execute([$comId]);
    }
}

header('Location: communities.php?status=deleted');
exit;
?>

