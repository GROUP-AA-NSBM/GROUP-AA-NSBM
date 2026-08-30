<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-primary">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error">Logout</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-header">
      <div>
        <h1 class="admin-title">Manage Events</h1>
        <p class="admin-subtitle">View, update, or remove existing campus events</p>
      </div>
      <a href="create-event.php" class="btn admin-btn-black">
        + Add New Event
      </a>
    </div>

    <div class="card admin-card-container">
      <div class="admin-table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Event Title</th>
              <th>Category</th>
              <th>Date & Time</th>
              <th>Location</th>
              <th style="text-align: center;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td style="font-weight: bold;">NSBM Tech Fiesta 2026</td>
              <td>Computing & IT</td>
              <td>Oct 15, 2026 <br><span style="font-size: 0.75rem; color: #6b7280;">09:00 AM</span></td>
              <td>Auditorium</td>
              <td class="admin-actions-cell">
                <a href="edit-event.php?id=1" class="btn btn-sm btn-outline admin-btn-edit">Edit</a>
                <a href="delete-event.php?id=1" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
              </td>
            </tr>

            <tr>
              <th>2</th>
              <td style="font-weight: bold;">Annual Sports Meet</td>
              <td>Sports & Athletics</td>
              <td>Nov 02, 2026 <br><span style="font-size: 0.75rem; color: #6b7280;">08:00 AM</span></td>
              <td>Main Ground</td>
              <td class="admin-actions-cell">
                <a href="edit-event.php?id=2" class="btn btn-sm btn-outline admin-btn-edit">Edit</a>
                <a href="delete-event.php?id=2" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
              </td>
            </tr>

            <tr>
              <th>3</th>
              <td style="font-weight: bold;">Business Leader Summit</td>
              <td>Business</td>
              <td>Dec 10, 2026 <br><span style="font-size: 0.75rem; color: #6b7280;">10:30 AM</span></td>
              <td>Hall B</td>
              <td class="admin-actions-cell">
                <a href="edit-event.php?id=3" class="btn btn-sm btn-outline admin-btn-edit">Edit</a>
                <a href="delete-event.php?id=3" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>