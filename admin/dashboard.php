<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>

<div class="min-h-screen bg-base-200 flex flex-col md:flex-row">
  
  <aside class="w-full md:w-64 bg-base-100 shadow-xl p-6">
    <h2 class="text-2xl font-extrabold text-primary mb-6">Admin Panel</h2>
    <nav class="space-y-2">
      <a href="dashboard.php" class="btn btn-primary w-full justify-start text-left">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost w-full justify-start text-left">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost w-full justify-start text-left">Create Event</a>
      <a href="categories.php" class="btn btn-ghost w-full justify-start text-left">Categories</a>
      <a href="announcements.php" class="btn btn-ghost w-full justify-start text-left">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost w-full justify-start text-left">Registrations</a>
      <hr class="my-4" />
      <a href="../auth/logout.php" class="btn btn-outline btn-error w-full">Logout</a>
    </nav>
  </aside>


  <main class="flex-1 p-6 md:p-10">
    

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
      <div>
        <h1 class="text-3xl font-extrabold">Welcome, Admin</h1>
        <p class="text-gray-500 mt-1">Overview of NSBM Event Hub activity</p>
      </div>
      <a href="create-event.php" class="btn bg-black hover:bg-gray-800 text-white mt-4 md:mt-0">
        + Create New Event
      </a>
    </div>

   
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      
      <div class="card bg-base-100 shadow-md p-6 border-l-4 border-primary">
        <span class="text-xs font-bold text-gray-400 uppercase">Total Events</span>
        <div class="text-3xl font-extrabold mt-2">12</div>
      </div>

      <div class="card bg-base-100 shadow-md p-6 border-l-4 border-secondary">
        <span class="text-xs font-bold text-gray-400 uppercase">Total Registrations</span>
        <div class="text-3xl font-extrabold mt-2">148</div>
      </div>

      <div class="card bg-base-100 shadow-md p-6 border-l-4 border-accent">
        <span class="text-xs font-bold text-gray-400 uppercase">Categories</span>
        <div class="text-3xl font-extrabold mt-2">5</div>
      </div>

      <div class="card bg-base-100 shadow-md p-6 border-l-4 border-neutral">
        <span class="text-xs font-bold text-gray-400 uppercase">Announcements</span>
        <div class="text-3xl font-extrabold mt-2">3</div>
      </div>

    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      
   
      <div class="card bg-base-100 shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
        <div class="flex flex-wrap gap-3">
          <a href="create-event.php" class="btn btn-outline btn-sm">+ Add Event</a>
          <a href="categories.php" class="btn btn-outline btn-sm">+ Add Category</a>
          <a href="announcements.php" class="btn btn-outline btn-sm">+ Post Notice</a>
          <a href="registrations.php" class="btn btn-outline btn-sm">View Attendees</a>
        </div>
      </div>

      <div class="card bg-base-100 shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">System Status</h2>
        <p class="text-sm text-gray-600">
          Everything is up and running smoothly. Use the sidebar to navigate through management options.
        </p>
      </div>

    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>