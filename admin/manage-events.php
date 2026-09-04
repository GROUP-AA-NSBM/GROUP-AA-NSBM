<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

$events = $pdo->query("
    SELECT e.*, c.name AS category_name 
    FROM events e 
    LEFT JOIN event_categories ec ON e.event_id = ec.event_id 
    LEFT JOIN categories c ON ec.category_id = c.category_id 
    ORDER BY e.start_time DESC
")->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-primary">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-header">
      <div>
        <h1 class="admin-title">Manage Events</h1>
      </div>
      <a href="create-event.php" class="btn admin-btn-black">
        + Add New Event
      </a>
    </div>

    <?php if (isset($_GET['status'])): ?>
      <?php if ($_GET['status'] === 'created'): ?>
        <div style="background-color: #dcfce7; color: #15803d; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
          Event published successfully!
        </div>
      <?php elseif ($_GET['status'] === 'updated'): ?>
        <div style="background-color: #e0f2fe; color: #0369a1; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
          Event updated successfully!
        </div>
      <?php elseif ($_GET['status'] === 'deleted'): ?>
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
          Event deleted successfully!
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="card admin-card-container">
      <div class="admin-table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Event Title</th>
              <th>Category</th>
              <th>Date & Time</th>
              <th>Location</th>
              <th style="text-align: center;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($events)): ?>
              <tr>
                <td colspan="6" style="text-align: center; padding: 24px; color: #111827; font-weight: 500;">No campus events found. Click "+ Add New Event" to publish one!</td>
              </tr>
            <?php else: ?>
              <?php foreach ($events as $index => $ev): ?>
                <tr>
                  <th><?php echo $index + 1; ?></th>
                  <td style="font-weight: bold; color: #000000;"><?php echo htmlspecialchars($ev['title']); ?></td>
                  <td style="color: #111827;"><?php echo htmlspecialchars($ev['category_name'] ?? 'General'); ?></td>
                  <td style="color: #111827;">
                    <?php echo date('M d, Y', strtotime($ev['start_time'])); ?> <br>
                    <span style="font-size: 0.75rem; color: #111827; font-weight: 600;"><?php echo date('h:i A', strtotime($ev['start_time'])); ?></span>
                  </td>
                  <td><?php echo htmlspecialchars($ev['venue']); ?></td>
                  <td class="admin-actions-cell">
                    <a href="edit-event.php?id=<?php echo $ev['event_id']; ?>" class="btn btn-sm btn-outline admin-btn-edit">Edit</a>
                    <a href="delete-event.php?id=<?php echo $ev['event_id']; ?>" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
                  </td>
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