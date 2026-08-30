<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>

<div class="min-h-screen bg-base-200 flex flex-col md:flex-row">
  
  <aside class="w-full md:w-64 bg-base-100 shadow-xl p-6">
    <h2 class="text-2xl font-extrabold text-primary mb-6">Admin Panel</h2>
    <nav class="space-y-2">
      <a href="dashboard.php" class="btn btn-ghost w-full justify-start text-left">Dashboard</a>
      <a href="manage-events.php" class="btn btn-primary w-full justify-start text-left">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost w-full justify-start text-left">Create Event</a>
      <a href="categories.php" class="btn btn-ghost w-full justify-start text-left">Categories</a>
      <a href="announcements.php" class="btn btn-ghost w-full justify-start text-left">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost w-full justify-start text-left">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error w-full">Logout</a>
    </nav>
  </aside>

  <main class="flex-1 p-6 md:p-10">
    
    <div class="max-w-3xl mx-auto">
      <div class="mb-6 flex items-center justify-between">
        <div>
          <h1 class="text-3xl font-extrabold">Edit Event</h1>
          <p class="text-black mt-1">Update details for the selected campus event</p>
        </div>
        <a href="manage-events.php" class="btn btn-outline btn-sm">Cancel</a>
      </div>

      <div class="card bg-base-100 shadow-xl">
        <form id="editEventForm" action="edit-event-process.php" method="POST" enctype="multipart/form-data" class="card-body space-y-4">
          
          <input type="hidden" name="event_id" value="<?php echo $_GET['id'] ?? 1; ?>">

          <div class="form-control">
            <label class="label font-semibold">Event Title</label>
            <input type="text" name="title" id="eventTitle" value="NSBM Tech Fiesta 2026" class="input input-bordered w-full" required />
          </div>

          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div class="form-control">
              <label class="label font-semibold">Category</label>
              <select name="category_id" id="eventCategory" class="select select-bordered w-full" required>
                <option value="1" selected>Computing & IT</option>
                <option value="2">Business & Management</option>
                <option value="3">Sports & Athletics</option>
                <option value="4">Cultural & Music</option>
              </select>
            </div>

            <div class="form-control">
              <label class="label font-semibold">Venue / Location</label>
              <input type="text" name="location" id="eventLocation" value="Auditorium" class="input input-bordered w-full" required />
            </div>

          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div class="form-control">
              <label class="label font-semibold">Event Date</label>
              <input type="date" name="event_date" id="eventDate" value="2026-10-15" class="input input-bordered w-full" required />
            </div>

            <div class="form-control">
              <label class="label font-semibold">Start Time</label>
              <input type="time" name="event_time" id="eventTime" value="09:00" class="input input-bordered w-full" required />
            </div>

          </div>

          <div class="form-control">
            <label class="label font-semibold">Description</label>
            <textarea name="description" id="eventDescription" rows="4" class="textarea textarea-bordered w-full" required>Annual flagship tech event featuring hackathons, project showcases, and tech talks.</textarea>
          </div>

          <div class="form-control">
            <label class="label font-semibold">Update Banner (Optional)</label>
            <input type="file" name="banner" id="eventBanner" accept="image/*" class="file-input file-input-bordered w-full" />
          </div>

          <div class="pt-4 flex gap-3">
            <button type="submit" class="btn btn-primary flex-1">Save Changes</button>
            <a href="manage-events.php" class="btn btn-ghost">Cancel</a>
          </div>

        </form>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>