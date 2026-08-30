<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>
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
      <a href="../auth/logout.php" class="btn btn-outline btn-error">Logout</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Event Categories</h1>
      <p class="admin-subtitle">Manage event categories used across the portal</p>
    </div>

    <div class="admin-split-layout">
      
      <div class="card" style="height: fit-content;">
        <div class="card-body">
          <h2 class="card-title" style="margin-bottom: 8px;">Add New Category</h2>
          <form id="addCategoryForm" action="categories-process.php" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
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
              <tr>
                <th>1</th>
                <td style="font-weight: bold;">Computing & IT</td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>2</th>
                <td style="font-weight: bold;">Business & Management</td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>3</th>
                <td style="font-weight: bold;">Sports & Athletics</td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>4</th>
                <td style="font-weight: bold;">Cultural & Music</td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>