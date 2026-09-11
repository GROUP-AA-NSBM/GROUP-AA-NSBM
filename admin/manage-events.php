<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
// check admin login
requireAdmin();

// fetch all events with category
$events = $pdo->query("
    SELECT events.*, categories.name AS category_name 
    FROM events 
    LEFT JOIN categories ON events.category_id = categories.category_id 
    ORDER BY events.start_time DESC
")->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-page">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-primary">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="communities.php" class="btn btn-ghost">Communities</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-header">
      <div>
        <h1 class="admin-title">Manage Events</h1>
      </div>
      <a href="create-event.php" class="btn admin-btn-black" style="padding: 9px 18px; height: 39px; min-height: 39px;">
        + Add New Event
      </a>
    </div>

    <?php if (isset($_GET['status'])): ?>
      <p style="color: #16a34a; font-weight: bold; margin-bottom: 16px;">
        Action completed successfully!
      </p>
    <?php endif; ?>

    <div class="card admin-card-box">
      <div class="table-box">
        <table class="table">
          <thead>
            <tr>
              <th>no:</th>
              <th>Event Title</th>
              <th>Category</th>
              <th>Date and Time</th>
              <th>Location</th>
              <th align="center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($events as $index => $row): ?>
              <tr>
                <th><?php echo $index + 1; ?></th>
                <td><b><?php echo htmlspecialchars($row['title']); ?></b></td>
                <td style="color: #111827;"><?php echo htmlspecialchars($row['category_name'] ?? 'General'); ?></td>
                <td style="color: #111827;">
                  <?php echo date('M d, Y', strtotime($row['start_time'])); ?> <br>
                  <span style="font-size: 0.75rem; color: #111827; font-weight: 600;"><?php echo date('h:i A', strtotime($row['start_time'])); ?></span>
                </td>
                <td><?php echo htmlspecialchars($row['venue']); ?></td>
                <td class="admin-actions-cell">
                  <a href="edit-event.php?id=<?php echo $row['event_id']; ?>" class="btn btn-sm btn-outline admin-btn-edit" style="height: 31px; min-height: 31px; padding: 4px 13px; font-size: 13px;">Edit</a>
                  <a href="delete-event.php?id=<?php echo $row['event_id']; ?>" class="btn btn-sm btn-outline btn-error" style="height: 27px; min-height: 27px; padding: 2px 10px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>