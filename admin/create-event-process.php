<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = trim($_POST['title'] ?? '');
    $categoryId  = intval($_POST['category_id'] ?? 0);
    $location    = trim($_POST['location'] ?? '');
    $eventDate   = trim($_POST['event_date'] ?? '');
    $eventTime   = trim($_POST['event_time'] ?? '');
    $description = trim($_POST['description'] ?? '');

    $startTime = $eventDate . ' ' . $eventTime . ':00';
    $bannerUrl = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800';

    if (!empty($_FILES['banner']['name'])) {
        $uploadDir = __DIR__ . '/../uploads/events/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = time() . '_' . basename($_FILES['banner']['name']);
        $targetPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['banner']['tmp_name'], $targetPath)) {
            $bannerUrl = '/GROUP-AA-NSBM/uploads/events/' . $fileName;
        }
    }

    if (!empty($title) && !empty($location) && !empty($eventDate)) {
        $adminId = $_SESSION['user_id'] ?? 1;
        $stmt = $pdo->prepare('INSERT INTO events (title, description, venue, start_time, banner_image_url, status, created_by) VALUES (?, ?, ?, ?, ?, "published", ?)');
        $stmt->execute([$title, $description, $location, $startTime, $bannerUrl, $adminId]);
        $eventId = $pdo->lastInsertId();

        if ($categoryId > 0) {
            $catStmt = $pdo->prepare('INSERT INTO event_categories (event_id, category_id) VALUES (?, ?)');
            $catStmt->execute([$eventId, $categoryId]);
        }

        header('Location: manage-events.php?status=created');
        exit;
    }
}

header('Location: create-event.php?error=empty_fields');
exit;
?>