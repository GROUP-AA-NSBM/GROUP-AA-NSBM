<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['community_name'] ?? '');
    $faculty = trim($_POST['faculty'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (!empty($name)) {
        $stmt = $pdo->prepare('INSERT INTO communities (name, faculty, description) VALUES (?, ?, ?)');
        $stmt->execute([$name, $faculty, $description]);
        header('Location: communities.php?status=created');
        exit;
    }
}

$communities = $pdo->query("SELECT * FROM communities ORDER BY community_id ASC")->fetchAll();

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
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="communities.php" class="btn btn-primary">Communities</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Communities & Clubs</h1>
    </div>

    <div style="display: flex; flex-direction: column; gap: 24px;">
      
      <div class="card" style="height: fit-content;">
        <div class="card-body">
          <h2 class="card-title" style="margin-bottom: 8px;">Add New Community</h2>
          <form id="addCommunityForm" action="" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            <div class="form-control">
              <label><b>Community / Club Name</b></label>
              <input type="text" name="community_name" class="input input-bordered" style="width: 100%;" required />
            </div>

            <div class="form-control">
              <label><b>Faculty</b></label>
              <select name="faculty" class="select select-bordered" style="width: 100%;">
                <option value="General">General / University Wide</option>
                <option value="Faculty of Computing">Faculty of Computing</option>
                <option value="Faculty of Business">Faculty of Business</option>
                <option value="Faculty of Engineering">Faculty of Engineering</option>
                <option value="Faculty of Science">Faculty of Science</option>
              </select>
            </div>

            <div class="form-control">
              <label><b>Description</b></label>
              <textarea name="description" rows="3" class="textarea textarea-bordered" style="width: 100%;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 95%; height: 41px; min-height: 41px; padding: 8px 20px;">Add Community</button>
          </form>
        </div>
      </div>

      <div class="card admin-card-box">
        <div class="table-box">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Community Name</th>
                <th>Faculty</th>
                <th align="center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($communities as $index => $row): ?>
                <tr>
                  <th><?php echo $index + 1; ?></th>
                  <td><b><?php echo htmlspecialchars($row['name']); ?></b></td>
                  <td><?php echo htmlspecialchars($row['faculty'] ?? 'General'); ?></td>
                  <td align="center">
                    <a href="delete-community.php?id=<?php echo $row['community_id']; ?>" class="btn btn-sm btn-outline btn-error" style="height: 27px; min-height: 27px; padding: 2px 11px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this community?');">Delete</a>
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

<?php include __DIR__ . '/../includes/footer.php'; ?>

