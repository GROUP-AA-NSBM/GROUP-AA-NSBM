<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

$event_count = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$reg_count   = $pdo->query("SELECT COUNT(*) FROM event_registrations")->fetchColumn();
$cat_count   = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$com_count   = $pdo->query("SELECT COUNT(*) FROM communities")->fetchColumn();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-page">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="communities.php" class="btn btn-ghost">Communities</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-header" style="justify-content: flex-end;">
      <a href="create-event.php" class="btn admin-btn-black" style="padding: 10px 22px; height: 42px; min-height: 42px;">
        + Create New Event
      </a>
    </div>

    <div class="admin-stats-grid">
      
      <div class="card stat-card stat-primary">
        <span class="stat-label">Total Events</span>
        <div class="stat-value"><?php echo $event_count; ?></div>
      </div>

      <div class="card stat-card stat-secondary">
        <span class="stat-label">Total Registrations</span>
        <div class="stat-value"><?php echo $reg_count; ?></div>
      </div>

      <div class="card stat-card stat-accent">
        <span class="stat-label">Categories</span>
        <div class="stat-value"><?php echo $cat_count; ?></div>
      </div>

      <div class="card stat-card stat-neutral">
        <span class="stat-label">Communities</span>
        <div class="stat-value"><?php echo $com_count; ?></div>
      </div>

    </div>

  </main>
</div>