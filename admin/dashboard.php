<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

$totalEvents        = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$totalRegistrations = $pdo->query("SELECT COUNT(*) FROM event_registrations")->fetchColumn();
$totalCategories    = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$totalAnnouncements = $pdo->query("SELECT COUNT(*) FROM announcements")->fetchColumn();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-header">
      <div>
        <h1 class="admin-title">Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Admin'); ?></h1>
      </div>
      <a href="create-event.php" class="btn admin-btn-black">
        + Create New Event
      </a>
    </div>

    <div class="admin-stats-grid">
      
      <div class="card stat-card stat-primary">
        <span class="stat-label">Total Events</span>
        <div class="stat-value"><?php echo $totalEvents; ?></div>
      </div>

      <div class="card stat-card stat-secondary">
        <span class="stat-label">Total Registrations</span>
        <div class="stat-value"><?php echo $totalRegistrations; ?></div>
      </div>

      <div class="card stat-card stat-accent">
        <span class="stat-label">Categories</span>
        <div class="stat-value"><?php echo $totalCategories; ?></div>
      </div>

      <div class="card stat-card stat-neutral">
        <span class="stat-label">Announcements</span>
        <div class="stat-value"><?php echo $totalAnnouncements; ?></div>
      </div>

    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>