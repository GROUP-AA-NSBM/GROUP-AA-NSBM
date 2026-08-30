<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>

<div class="min-h-screen bg-base-200 flex flex-col md:flex-row">
  
  <aside class="w-full md:w-64 bg-base-100 shadow-xl p-6">
    <h2 class="text-2xl font-extrabold text-primary mb-6">Admin Panel</h2>
    <nav class="space-y-2">
      <a href="dashboard.php" class="btn btn-ghost w-full justify-start text-left">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost w-full justify-start text-left">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost w-full justify-start text-left">Create Event</a>
      <a href="categories.php" class="btn btn-primary w-full justify-start text-left">Categories</a>
      <a href="announcements.php" class="btn btn-ghost w-full justify-start text-left">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost w-full justify-start text-left">Registrations</a>
      <a href="../auth/logout.php" class="btn btn-outline btn-error w-full">Logout</a>
    </nav>
  </aside>

  <main class="flex-1 p-6 md:p-10">
    
    <div class="mb-6">
      <h1 class="text-3xl font-extrabold">Event Categories</h1>
      <p class="text-black mt-1">Manage event categories used across the portal</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      
      <div class="card bg-base-100 shadow-xl h-fit">
        <div class="card-body">
          <h2 class="card-title mb-2">Add New Category</h2>
          <form id="addCategoryForm" action="categories-process.php" method="POST" class="space-y-4">
            <div class="form-control">
              <label class="label font-semibold">Category Name</label>
              <input type="text" name="category_name" placeholder="e.g. Gaming & Esports" class="input input-bordered w-full" required />
            </div>
            <button type="submit" class="btn btn-primary w-full">Add Category</button>
          </form>
        </div>
      </div>

      <div class="card bg-base-100 shadow-xl lg:col-span-2 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="table w-full">
            <thead class="bg-base-200">
              <tr>
                <th>#</th>
                <th>Category Name</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td class="font-bold">Computing & IT</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>2</th>
                <td class="font-bold">Business & Management</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>3</th>
                <td class="font-bold">Sports & Athletics</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline btn-error btn-delete">Delete</button>
                </td>
              </tr>
              <tr>
                <th>4</th>
                <td class="font-bold">Cultural & Music</td>
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