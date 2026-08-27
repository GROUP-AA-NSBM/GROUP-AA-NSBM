<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>

<div class="min-h-screen bg-base-200 flex items-center justify-center px-4 py-12">
  <div class="card bg-base-100 w-full max-w-md shadow-2xl">
    <form id="adminLoginForm" action="admin-login-process.php" method="POST" class="card-body">
      
      <div class="text-center mb-4">
        <h2 class="text-3xl font-extrabold">Admin Portal</h2>
        <p class="text-sm text-gray-500 mt-1">Sign in to manage NSBM Event Hub</p>
      </div>

      <div class="form-control">
        <label class="label">
          <span class="label-text font-semibold">Admin Email Address</span>
        </label>
        <input 
          type="email" 
          id="adminEmail"
          name="email" 
          placeholder="admin@nsbm.ac.lk" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control mt-4">
        <label class="label">
          <span class="label-text font-semibold">Password</span>
        </label>
        <input 
          type="password" 
          id="adminPassword"
          name="password" 
          placeholder="••••••••" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn bg-black hover:bg-gray-800 text-white text-lg border-none w-full">
          Log In as Admin
        </button>
      </div>

    </form>
  </div>
</div>

<script src="../assets/js/validation.js"></script>