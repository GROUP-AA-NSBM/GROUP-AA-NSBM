<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND role = "admin" LIMIT 1');
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if (is_array($admin) && !empty($admin['password']) && (password_verify($password, $admin['password']) || $password === $admin['password'])) {
            $_SESSION['logged_in']  = true;
            $_SESSION['user_id']    = $admin['user_id'];
            $_SESSION['user_name']  = $admin['full_name'];
            $_SESSION['user_email'] = $admin['email'];
            $_SESSION['role']       = 'admin';

            header('Location: /GROUP-AA-NSBM/admin/dashboard.php');
            exit;
        } else {
            $errorMessage = 'Invalid admin email or password.';
        }
    } else {
        $errorMessage = 'Please enter both email and password.';
    }
}

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/not-loggedin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-login-wrapper">
  <div class="card admin-login-box">
    <form id="adminLoginForm" action="" method="POST" class="card-body" style="display: flex; flex-direction: column; gap: 16px;">
      
      <div style="text-align: center; margin-bottom: 8px;">
        <h2 style="font-size: 1.875rem; font-weight: 800; margin: 0;">Admin Portal</h2>
      </div>

      <?php if (!empty($errorMessage)): ?>
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 8px; font-size: 0.875rem; font-weight: 600; text-align: center;">
          <?php echo htmlspecialchars($errorMessage); ?>
        </div>
      <?php endif; ?>

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