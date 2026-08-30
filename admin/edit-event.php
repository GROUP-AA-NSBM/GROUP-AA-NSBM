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
    
    <div class="admin-form-container">
      <div class="admin-header">
        <div>
          <h1 class="admin-title">Edit Event</h1>
          <p class="admin-subtitle">Update details for the selected campus event</p>
        </div>
        <a href="manage-events.php" class="btn btn-outline btn-sm">Cancel</a>
      </div>

      <div class="card">
        <form id="editEventForm" action="edit-event-process.php" method="POST" enctype="multipart/form-data" class="card-body" style="display: flex; flex-direction: column; gap: 16px;">
          
          <input type="hidden" name="event_id" value="<?php echo $_GET['id'] ?? 1; ?>">

          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Event Title</span></label>
            <input type="text" name="title" id="eventTitle" value="NSBM Tech Fiesta 2026" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="admin-form-grid">
            
            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Category</span></label>
              <select name="category_id" id="eventCategory" class="select select-bordered" style="width: 100%;" required>
                <option value="1" selected>Computing & IT</option>
                <option value="2">Business & Management</option>
                <option value="3">Sports & Athletics</option>
                <option value="4">Cultural & Music</option>
              </select>
            </div>

            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Venue / Location</span></label>
              <input type="text" name="location" id="eventLocation" value="Auditorium" class="input input-bordered" style="width: 100%;" required />
            </div>

          </div>

          <div class="admin-form-grid">
            
            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Event Date</span></label>
              <input type="date" name="event_date" id="eventDate" value="2026-10-15" class="input input-bordered" style="width: 100%;" required />
            </div>

            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Start Time</span></label>
              <input type="time" name="event_time" id="eventTime" value="09:00" class="input input-bordered" style="width: 100%;" required />
            </div>

          </div>

          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Description</span></label>
            <textarea name="description" id="eventDescription" rows="4" class="textarea textarea-bordered" style="width: 100%;" required>Annual flagship tech event featuring hackathons, project showcases, and tech talks.</textarea>
          </div>

          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Update Banner (Optional)</span></label>
            <input type="file" name="banner" id="eventBanner" accept="image/*" class="file-input file-input-bordered" style="width: 100%;" />
          </div>

          <div class="admin-form-actions">
            <button type="submit" class="btn btn-primary" style="flex: 1;">Save Changes</button>
            <a href="manage-events.php" class="btn btn-ghost">Cancel</a>
          </div>

        </form>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>