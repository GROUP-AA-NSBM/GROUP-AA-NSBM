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
      <hr class="my-4" />
      <a href="../auth/logout.php" class="btn btn-outline btn-error w-full">Logout</a>
    </nav>
  </aside>

  <main class="flex-1 p-6 md:p-10">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
      <div>
        <h1 class="text-3xl font-extrabold">Manage Events</h1>
        <p class="text-gray-500 mt-1">View, update, or remove existing campus events</p>
      </div>
      <a href="create-event.php" class="btn bg-black hover:bg-gray-800 text-white mt-4 md:mt-0">
        + Add New Event
      </a>
    </div>

    <div class="card bg-base-100 shadow-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="table w-full">
          <thead class="bg-base-200">
            <tr>
              <th>#</th>
              <th>Event Title</th>
              <th>Category</th>
              <th>Date & Time</th>
              <th>Location</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td class="font-bold">NSBM Tech Fiesta 2026</td>
              <td><span class="badge badge-primary">Computing & IT</span></td>
              <td>Oct 15, 2026 <br><span class="text-xs text-gray-500">09:00 AM</span></td>
              <td>Auditorium</td>
              <td class="text-center space-x-1">
                <a href="edit-event.php?id=1" class="btn btn-sm btn-outline btn-info">Edit</a>
                <a href="delete-event.php?id=1" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
              </td>
            </tr>

            <tr>
              <th>2</th>
              <td class="font-bold">Annual Sports Meet</td>
              <td><span class="badge badge-secondary">Sports & Athletics</span></td>
              <td>Nov 02, 2026 <br><span class="text-xs text-gray-500">08:00 AM</span></td>
              <td>Main Ground</td>
              <td class="text-center space-x-1">
                <a href="edit-event.php?id=2" class="btn btn-sm btn-outline btn-info">Edit</a>
                <a href="delete-event.php?id=2" class="btn btn-sm btn-outline btn-error btn-delete">Delete</a>
              </td>
            </tr>

            <tr>
              <th>3</th>
              <td class="font-bold">Business Leader Summit</td>
              <td><span class="badge badge-accent">Business</span></td>
              <td>Dec 10, 2026 <br><span class="text-xs text-gray-500">10:30 AM</span></td>
              <td>Hall B</td>
              <td class="text-center space-x-1">
                <a href="edit-event.php?id=3" class="btn btn-sm btn-outline btn-info">Edit</a>
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