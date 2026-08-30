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
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-primary">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error">Logout</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div style="margin-bottom: 24px;">
      <h1 class="admin-title">Student Registrations</h1>
    </div>

    <div class="card admin-card-container">
      <div class="admin-table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Student Name</th>
              <th>Student Email</th>
              <th>Event Registered</th>
              <th>Date Signed Up</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td style="font-weight: bold;">borski Perera</td>
              <td>brah.p@nsbm.ac.lk</td>
              <td>NSBM Tech Fiesta 2026</td>
              <td style="font-size: 0.875rem; color: #6b7280;">Aug 29, 2026</td>
            </tr>
            <tr>
              <th>2</th>
              <td style="font-weight: bold;">Nelli Fernando</td>
              <td>nili.f@nsbm.ac.lk</td>
              <td>Annual Sports Meet</td>
              <td style="font-size: 0.875rem; color: #6b7280;">Aug 28, 2026</td>
            </tr>
            <tr>
              <th>3</th>
              <td style="font-weight: bold;">SaMahan Silva</td>
              <td>sammahan.s@nsbm.ac.lk</td>
              <td>Business Leader Summit</td>
              <td style="font-size: 0.875rem; color: #6b7280;">Aug 25, 2026</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>