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
      <a href="announcements.php" class="btn btn-primary w-full justify-start text-left">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost w-full justify-start text-left">Registrations</a>
      <hr class="my-4" />
      <a href="../auth/logout.php" class="btn btn-outline btn-error w-full">Logout</a>
    </nav>
  </aside>

  <main class="flex-1 p-6 md:p-10">
    
    <div class="mb-6">
      <h1 class="text-3xl font-extrabold">Campus Announcements</h1>
      <p class="text-gray-500 mt-1">Post updates and news for all registered students</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      
      <div class="card bg-base-100 shadow-xl h-fit">
        <div class="card-body">
          <h2 class="card-title mb-2">New Announcement</h2>
          <form id="announcementForm" action="announcements-process.php" method="POST" class="space-y-4">
            
            <div class="form-control">
              <label class="label font-semibold">Title</label>
              <input type="text" name="title" placeholder="e.g. Mid-Semester Exam Schedule" class="input input-bordered w-full" required />
            </div>

            <div class="form-control">
              <label class="label font-semibold">Message</label>
              <textarea name="content" rows="4" placeholder="Write announcement details here..." class="textarea textarea-bordered w-full" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-full">Post Announcement</button>
          </form>
        </div>
      </div>

      <div class="card bg-base-100 shadow-xl lg:col-span-2 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="table w-full">
            <thead class="bg-base-200">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date Posted</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td class="font-bold">Registration open for Tech Fiesta 2026</td>
                <td class="text-sm text-gray-500">Aug 28, 2026</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>2</th>
                <td class="font-bold">Annual Sports Meet practice schedule updated</td>
                <td class="text-sm text-gray-500">Aug 20, 2026</td>
                <td class="text-center">
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