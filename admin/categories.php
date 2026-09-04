<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['category_name'] ?? '');

    if (!empty($name)) {
        $stmt = $pdo->prepare('INSERT INTO categories (name) VALUES (?)');
        $stmt->execute([$name]);
        header('Location: categories.php?status=created');
        exit;
    }
}

$categories = $pdo->query("SELECT * FROM categories ORDER BY category_id ASC")->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-primary">Categories</a>
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Event Categories</h1>
    </div>

    <div class="admin-split-layout">
      
      <div class="card" style="height: fit-content;">
        <div class="card-body">
          <h2 class="card-title" style="margin-bottom: 8px;">Add New Category</h2>
          <form id="addCategoryForm" action="" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Category Name</span></label>
              <input type="text" name="category_name" placeholder="e.g. Gaming & Esports" class="input input-bordered" style="width: 100%;" required />
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Add Category</button>
          </form>
        </div>
      </div>

      <div class="card admin-card-container">
        <div class="admin-table-wrapper">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Name</th>
                <th style="text-align: center;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($categories)): ?>
                <tr>
                  <td colspan="3" style="text-align: center; padding: 24px; color: #111827; font-weight: 500;">No categories found.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($categories as $index => $cat): ?>
                  <tr>
                    <th><?php echo $index + 1; ?></th>
                    <td style="font-weight: bold;"><?php echo htmlspecialchars($cat['name']); ?></td>
                    <td style="text-align: center;">
                      <a href="delete-category.php?id=<?php echo $cat['category_id']; ?>" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
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