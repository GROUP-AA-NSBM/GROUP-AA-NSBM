<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && (password_verify($password, $user['password']) || $password === $user['password'])) {
            $_SESSION['user_id']    = $user['user_id'];
            $_SESSION['user_name']  = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role']       = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: /GROUP-AA-NSBM/admin/dashboard.php");
                exit;
            } else {
                header("Location: /GROUP-AA-NSBM/index.php");
                exit;
            }
        } else {
            $errorMessage = 'Invalid email address or password.';
        }
    } else {
        $errorMessage = 'Please enter both email and password.';
    }
}

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/not-loggedin-navbar.php'; 
?>

<div class="min-h-screen flex items-center justify-center px-4 py-12" style="background-color: #ffffff;">
  <div class="card bg-base-100 w-full max-w-md shadow-none" style="border: 1px solid #e5e7eb;">
    <form id="loginForm" action="" method="POST" class="card-body">
      
      <center>
        <h2 class="text-3xl font-extrabold text-black">Welcome Back</h2>
        <p class="text-sm text-gray-900 font-medium mt-1">Sign in to NSBM Event Hub</p>
      </center>
      <br>

      <?php if (!empty($errorMessage)): ?>
        <center>
          <p style="color: red; margin-bottom: 12px;"><b><?php echo htmlspecialchars($errorMessage); ?></b></p>
        </center>
      <?php endif; ?>

      <div class="form-control">
        <label class="label">
          <b>Email Address</b>
        </label>
        <input 
          type="email" 
          id="loginEmail"
          name="email" 
          placeholder="type your email here" 
          class="input input-bordered w-full" 
          required 
        />
      </div>

      <div class="form-control mt-4">
        <label class="label">
          <b>Password</b>
        </label>
        <input 
          type="password" 
          id="loginPassword"
          name="password" 
          placeholder="type your password here" 
          class="input input-bordered w-full" 
          required 
        />
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn btn-primary text-lg border-none w-full">
          Log In
        </button>
      </div>

      <center>
        <p class="text-sm text-gray-900" style="margin-top: 16px;">
          Don't have an account? 
          <a href="register.php" class="link font-semibold text-primary">Register here</a>
        </p>
      </center>

    </form>
  </div>
</div>