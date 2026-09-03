<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']);
    if ($eventId > 0) {
        $stmt = $pdo->prepare('DELETE FROM events WHERE event_id = ?');
        $stmt->execute([$eventId]);
    }
    header("Location: manage-events.php?status=deleted");
    exit();
} else {
    header("Location: manage-events.php");
    exit();
}
?>
