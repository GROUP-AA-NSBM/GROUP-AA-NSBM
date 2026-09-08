<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 

$registrations = $pdo->query("
    SELECT event_registrations.*, events.title AS event_title 
    FROM event_registrations 
    JOIN events ON event_registrations.event_id = events.event_id 
    ORDER BY event_registrations.registration_id DESC
")->fetchAll();
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="registrations.php" class="btn btn-primary">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Student Registrations</h1>
    </div>

    <div class="card admin-card-container">
      <div class="admin-table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Student Name</th>
              <th>Student Email</th>
              <th>Faculty</th>
              <th>Event Registered</th>
              <th>Student ID / Batch</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($registrations)): ?>
              <tr>
                <td colspan="7" align="center" style="padding: 24px;"><b>No student registrations recorded yet.</b></td>
              </tr>
            <?php else: ?>
              <?php foreach ($registrations as $index => $reg): ?>
                <tr>
                  <th><?php echo $index + 1; ?></th>
                  <td><b><?php echo htmlspecialchars($reg['student_name']); ?></b></td>
                  <td style="color: #111827;"><?php echo htmlspecialchars($reg['student_email']); ?></td>
                  <td style="color: #111827; font-weight: 500;"><?php echo htmlspecialchars($reg['faculty']); ?></td>
                  <td style="color: #111827;"><?php echo htmlspecialchars($reg['event_title']); ?></td>
                  <td style="color: #111827;">
                    <?php echo htmlspecialchars($reg['student_id']); ?>
                    <?php if (!empty($reg['batch'])): ?>
                      <br><span style="font-size: 0.75rem; color: #111827; font-weight: 600;">Batch: <?php echo htmlspecialchars($reg['batch']); ?></span>
                    <?php endif; ?>
                  </td>
                  <td><span class="badge badge-success"><?php echo htmlspecialchars($reg['status']); ?></span></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>