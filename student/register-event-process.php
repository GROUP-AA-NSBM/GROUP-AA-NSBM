<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId     = intval($_POST['event_id'] ?? 0);
    $userId      = $_SESSION['user_id'] ?? 0;
    $studentName = trim($_POST['fname'] ?? $_SESSION['user_name'] ?? '');
    $studentEmail= trim($_POST['emailadd'] ?? $_SESSION['user_email'] ?? '');
    $contactNo   = trim($_POST['contnumber'] ?? '');
    $studentId   = trim($_POST['stid'] ?? '');
    $batch       = trim($_POST['batchno'] ?? '');
    $year        = trim($_POST['year'] ?? '');

    if ($eventId > 0 && $userId > 0) {
        // Check if already registered
        $checkStmt = $pdo->prepare('SELECT registration_id FROM event_registrations WHERE event_id = ? AND user_id = ? LIMIT 1');
        $checkStmt->execute([$eventId, $userId]);
        
        if ($checkStmt->fetch()) {
            header('Location: event.php?id=' . $eventId . '&status=already_registered');
            exit;
        }

        // Insert registration
        $insertStmt = $pdo->prepare('INSERT INTO event_registrations (event_id, user_id, student_name, student_email, contact_number, student_id, batch, academic_year, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, "registered")');
        $insertStmt->execute([$eventId, $userId, $studentName, $studentEmail, $contactNo, $studentId, $batch, $year]);

        header('Location: event.php?id=' . $eventId . '&status=success');
        exit;
    }
}

header('Location: /GROUP-AA-NSBM/index.php');
exit;
?>