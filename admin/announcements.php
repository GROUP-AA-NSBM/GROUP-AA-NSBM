<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title   = trim($_POST['title'] ?? '');
    $message = trim($_POST['content'] ?? '');

    if (!empty($title) && !empty($message)) {
        $stmt = $pdo->prepare('INSERT INTO announcements (title, message) VALUES (?, ?)');
        $stmt->execute([$title, $message]);
        header('Location: announcements.php?status=created');
        exit;
    }
}

$announcements = $pdo->query("SELECT * FROM announcements ORDER BY created_at DESC")->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/not-loggedin-navbar.php'; 
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
      <a href="announcements.php" class="btn btn-primary">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error">Logout</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Announcements</h1>
    </div>

    <div class="admin-split-layout">
      
      <div class="card" style="height: fit-content;">
        <div class="card-body">
          <h2 class="card-title" style="margin-bottom: 8px;">New Announcement</h2>
          <form id="announcementForm" action="" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            
            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Title</span></label>
              <input type="text" name="title" placeholder="e.g. Mid-Semester Exam Schedule" class="input input-bordered" style="width: 100%;" required />
            </div>

            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Message</span></label>
              <textarea name="content" rows="4" placeholder="Write announcement details here..." class="textarea textarea-bordered" style="width: 100%;" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Post Announcement</button>
          </form>
        </div>
      </div>

      <div class="card admin-card-container">
        <div class="admin-table-wrapper">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date Posted</th>
                <th style="text-align: center;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($announcements)): ?>
                <tr>
                  <td colspan="4" style="text-align: center; padding: 24px; color: #6b7280;">No announcements posted yet.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($announcements as $index => $ann): ?>
                  <tr>
                    <th><?php echo $index + 1; ?></th>
                    <td style="font-weight: bold;"><?php echo htmlspecialchars($ann['title']); ?></td>
                    <td style="font-size: 0.875rem; color: #6b7280;"><?php echo date('M d, Y', strtotime($ann['created_at'])); ?></td>
                    <td style="text-align: center;">
                      <a href="delete-announcement.php?id=<?php echo $ann['announcement_id']; ?>" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>