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
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="announcements.php" class="btn btn-primary">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error">Logout</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Announcements</h1>
      <p class="admin-subtitle">Post updates and news for all registered students</p>
    </div>

    <div class="admin-split-layout">
      
      <div class="card" style="height: fit-content;">
        <div class="card-body">
          <h2 class="card-title" style="margin-bottom: 8px;">New Announcement</h2>
          <form id="announcementForm" action="announcements-process.php" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            
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
              <tr>
                <th>1</th>
                <td style="font-weight: bold;">Registration open for Tech Fiesta 2026</td>
                <td style="font-size: 0.875rem; color: #6b7280;">Aug 28, 2026</td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>2</th>
                <td style="font-weight: bold;">Annual Sports Meet practice schedule updated</td>
                <td style="font-size: 0.875rem; color: #6b7280;">Aug 20, 2026</td>
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