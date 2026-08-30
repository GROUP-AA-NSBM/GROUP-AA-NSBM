<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if (isset($_GET['id'])) {
    $catId = intval($_GET['id']);
    if ($catId > 0) {
        $stmt = $pdo->prepare('DELETE FROM categories WHERE category_id = ?');
        $stmt->execute([$catId]);
    }
}

header('Location: categories.php?status=deleted');
exit;
?>