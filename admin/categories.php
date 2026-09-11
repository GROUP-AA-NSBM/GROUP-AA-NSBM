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

<div class="admin-page">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-primary">Categories</a>
      <a href="communities.php" class="btn btn-ghost">Communities</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Event Categories</h1>
    </div>

    <div style="display: flex; flex-direction: column; gap: 24px;">
      
      <div class="card" style="height: fit-content; max-width: 480px;">
        <div class="card-body" style="padding: 20px;">
          <h2 class="card-title" style="margin-bottom: 8px;">Add New Category</h2>
          <form id="addCategoryForm" action="" method="POST" style="display: flex; flex-direction: column; gap: 12px;">
            <div class="form-control">
              <label><b>Category Name</b></label>
              <input type="text" name="category_name" class="input input-bordered" style="width: 100%;" required />
            </div>
            <button type="submit" class="btn btn-primary" style="width: 160px; height: 39px; min-height: 39px; padding: 7px 18px;">Add Category</button>
          </form>
        </div>
      </div>

      <div class="card admin-card-box">
        <div class="table-box">
          <table class="table">
            <thead>
              <tr>
                <th>no:</th>
                <th>Category Name</th>
                <th align="center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $index => $row): ?>
                <tr>
                  <th><?php echo $index + 1; ?></th>
                  <td><b><?php echo htmlspecialchars($row['name']); ?></b></td>
                  <td align="center">
                    <a href="delete-category.php?id=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-outline btn-error" style="height: 27px; min-height: 27px; padding: 2px 11px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </main>
</div>