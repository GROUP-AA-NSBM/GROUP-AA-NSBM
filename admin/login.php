<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/not-loggedin-navbar.php'; ?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-login-wrapper">
  <div class="card admin-login-box">
    <form id="adminLoginForm" action="admin-login-process.php" method="POST" class="card-body" style="display: flex; flex-direction: column; gap: 16px;">
      
      <div style="text-align: center; margin-bottom: 8px;">
        <h2 style="font-size: 1.875rem; font-weight: 800; margin: 0;">Admin Portal</h2>
      </div>

      <div class="form-control">
        <label class="label">
          <span style="font-weight: 600;">Admin Email Address</span>
        </label>
        <input 
          type="email" 
          id="adminEmail"
          name="email" 
          placeholder="admin@nsbm.ac.lk" 
          class="input input-bordered focus:input-primary" 
          style="width: 100%;"
          required 
        />
      </div>

      <div class="form-control">
        <label class="label">
          <span style="font-weight: 600;">Password</span>
        </label>
        <input 
          type="password" 
          id="adminPassword"
          name="password" 
          placeholder="••••••••" 
          class="input input-bordered focus:input-primary" 
          style="width: 100%;"
          required 
        />
      </div>

      <div style="margin-top: 8px;">
        <button type="submit" class="btn admin-btn-black" style="width: 100%; font-size: 1.125rem;">
          Log In as Admin
        </button>
      </div>

    </form>
  </div>
</div>

<script src="../assets/js/validation.js"></script>