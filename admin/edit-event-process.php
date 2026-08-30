<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId     = intval($_POST['event_id'] ?? 0);
    $title       = trim($_POST['title'] ?? '');
    $categoryId  = intval($_POST['category_id'] ?? 0);
    $location    = trim($_POST['location'] ?? '');
    $eventDate   = trim($_POST['event_date'] ?? '');
    $eventTime   = trim($_POST['event_time'] ?? '');
    $description = trim($_POST['description'] ?? '');

    $startTime = $eventDate . ' ' . $eventTime . ':00';

    if ($eventId > 0 && !empty($title) && !empty($location) && !empty($eventDate)) {
        if (!empty($_FILES['banner']['name'])) {
            $uploadDir = __DIR__ . '/../uploads/events/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = time() . '_' . basename($_FILES['banner']['name']);
            $targetPath = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['banner']['tmp_name'], $targetPath)) {
                $bannerUrl = '/GROUP-AA-NSBM/uploads/events/' . $fileName;
                $stmt = $pdo->prepare('UPDATE events SET title = ?, description = ?, venue = ?, start_time = ?, banner_image_url = ? WHERE event_id = ?');
                $stmt->execute([$title, $description, $location, $startTime, $bannerUrl, $eventId]);
            }
        } else {
            $stmt = $pdo->prepare('UPDATE events SET title = ?, description = ?, venue = ?, start_time = ? WHERE event_id = ?');
            $stmt->execute([$title, $description, $location, $startTime, $eventId]);
        }

        if ($categoryId > 0) {
            $delCat = $pdo->prepare('DELETE FROM event_categories WHERE event_id = ?');
            $delCat->execute([$eventId]);
            $insCat = $pdo->prepare('INSERT INTO event_categories (event_id, category_id) VALUES (?, ?)');
            $insCat->execute([$eventId, $categoryId]);
        }

        header('Location: manage-events.php?status=updated');
        exit;
    }
}

header('Location: manage-events.php?error=update_failed');
exit;
?>