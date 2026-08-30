<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>

<div class="min-h-screen bg-base-200 flex flex-col md:flex-row">
  
  <aside class="w-full md:w-64 bg-base-100 shadow-xl p-6">
    <h2 class="text-2xl font-extrabold text-primary mb-6">Admin Panel</h2>
    <nav class="space-y-2">
      <a href="dashboard.php" class="btn btn-ghost w-full justify-start text-left">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost w-full justify-start text-left">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost w-full justify-start text-left">Create Event</a>
      <a href="categories.php" class="btn btn-ghost w-full justify-start text-left">Categories</a>
      <a href="announcements.php" class="btn btn-ghost w-full justify-start text-left">Announcements</a>
      <a href="registrations.php" class="btn btn-primary w-full justify-start text-left">Registrations</a>
      <hr class="my-4" />
      <a href="../auth/logout.php" class="btn btn-outline btn-error w-full">Logout</a>
    </nav>
  </aside>

  <main class="flex-1 p-6 md:p-10">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
      <div>
        <h1 class="text-3xl font-extrabold">Event Registrations</h1>
        <p class="text-gray-500 mt-1">View all student sign-ups for campus events</p>
      </div>
    </div>

    <div class="card bg-base-100 shadow-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="table w-full">
          <thead class="bg-base-200">
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
              <td class="font-bold">borski Perera</td>
              <td>brah.p@nsbm.ac.lk</td>
              <td><span class="badge badge-primary">NSBM Tech Fiesta 2026</span></td>
              <td class="text-sm text-gray-500">Aug 29, 2026</td>
            </tr>
            <tr>
              <th>2</th>
              <td class="font-bold">Nelli Fernando</td>
              <td>nili.f@nsbm.ac.lk</td>
              <td><span class="badge badge-secondary">Annual Sports Meet</span></td>
              <td class="text-sm text-gray-500">Aug 28, 2026</td>
            </tr>
            <tr>
              <th>3</th>
              <td class="font-bold">SaMahan Silva</td>
              <td>sammahan.s@nsbm.ac.lk</td>
              <td><span class="badge badge-accent">Business Leader Summit</span></td>
              <td class="text-sm text-gray-500">Aug 25, 2026</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>