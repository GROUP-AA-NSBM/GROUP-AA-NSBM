<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>
<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/not-loggedin-navbar.php'; 

$registrations = $pdo->query("
    SELECT r.*, e.title AS event_title, u.full_name AS user_full_name, u.email AS user_email_acc
    FROM event_registrations r
    JOIN events e ON r.event_id = e.event_id
    LEFT JOIN users u ON r.user_id = u.user_id
    ORDER BY r.registered_at DESC
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
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-primary">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error">Logout</a>
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
              <th>Event Registered</th>
              <th>Student ID / Batch</th>
              <th>Date Signed Up</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td style="font-weight: bold;">borski Perera</td>
              <td>brah.p@nsbm.ac.lk</td>
              <td>NSBM Tech Fiesta 2026</td>
              <td style="font-size: 0.875rem; color: #6b7280;">Aug 29, 2026</td>
            </tr>
            <tr>
              <th>2</th>
              <td style="font-weight: bold;">Nelli Fernando</td>
              <td>nili.f@nsbm.ac.lk</td>
              <td>Annual Sports Meet</td>
              <td style="font-size: 0.875rem; color: #6b7280;">Aug 28, 2026</td>
            </tr>
            <tr>
              <th>3</th>
              <td style="font-weight: bold;">SaMahan Silva</td>
              <td>sammahan.s@nsbm.ac.lk</td>
              <td>Business Leader Summit</td>
              <td style="font-size: 0.875rem; color: #6b7280;">Aug 25, 2026</td>
            </tr>
            <?php if (empty($registrations)): ?>
              <tr>
                <td colspan="6" style="text-align: center; padding: 24px; color: #6b7280;">No student registrations recorded yet.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($registrations as $index => $reg): ?>
                <tr>
                  <th><?php echo $index + 1; ?></th>
                  <td style="font-weight: bold;"><?php echo htmlspecialchars(!empty($reg['student_name']) ? $reg['student_name'] : ($reg['user_full_name'] ?? 'Student')); ?></td>
                  <td><?php echo htmlspecialchars(!empty($reg['student_email']) ? $reg['student_email'] : ($reg['user_email_acc'] ?? '-')); ?></td>
                  <td><?php echo htmlspecialchars($reg['event_title']); ?></td>
                  <td>
                    <?php echo htmlspecialchars($reg['student_id'] ?? '-'); ?>
                    <?php if (!empty($reg['batch'])): ?>
                      <br><span style="font-size: 0.75rem; color: #6b7280;">Batch: <?php echo htmlspecialchars($reg['batch']); ?></span>
                    <?php endif; ?>
                  </td>
                  <td style="font-size: 0.875rem; color: #6b7280;"><?php echo date('M d, Y h:i A', strtotime($reg['registered_at'])); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>