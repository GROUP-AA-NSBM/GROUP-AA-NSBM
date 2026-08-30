<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['Uname'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Check if email exists
        $checkStmt = $pdo->prepare('SELECT user_id FROM users WHERE email = ? LIMIT 1');
        $checkStmt->execute([$email]);

        if ($checkStmt->fetch()) {
            $errorMessage = 'This email is already registered. Please log in.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $pdo->prepare('INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, "student")');
            $insertStmt->execute([$name, $email, $hashedPassword]);

            $newUserId = $pdo->lastInsertId();

            $_SESSION['logged_in']  = true;
            $_SESSION['user_id']    = $newUserId;
            $_SESSION['user_name']  = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['role']       = 'student';

            header('Location: /GROUP-AA-NSBM/index.php');
            exit;
        }
    } else {
        $errorMessage = 'Please fill in all required fields.';
    }
}

include '../includes/header.php'; 
include '../includes/not-loggedin-navbar.php'; 
?>

<div class="min-h-screen bg-base-200 flex items-center justify-center px-4 py-12">
  <div class="card bg-base-100 w-full max-w-md shadow-2xl">
    <form id="registerForm" action="" method="POST" class="card-body">
      
      <div class="text-center mb-4">
        <h2 class="text-3xl font-extrabold">Welcome</h2>
        <p class="text-sm text-gray-500 mt-1">Sign up to NSBM Event Hub</p>
      </div>

      <?php if (!empty($errorMessage)): ?>
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 8px; font-size: 0.875rem; font-weight: 600; text-align: center; margin-bottom: 12px;">
          <?php echo htmlspecialchars($errorMessage); ?>
        </div>
      <?php endif; ?>

      <div class="form-control">
        <label class="label">
          <span class="label-text font-semibold">Name</span>
        </label>
        <input 
          type="text" 
          id="regName"
          name="Uname" 
          placeholder="Enter your name" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control">
        <label class="label">
          <span class="label-text font-semibold">NSBM Email Address</span>
        </label>
        <input 
          type="email" 
          id="regEmail"
          name="email" 
          placeholder="students@nsbm.ac.lk" 
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
          id="regPassword"
          name="password" 
          placeholder="••••••••" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn btn-primary text-lg border-none w-full">
          Sign Up
        </button>
      </div>

      <p class="text-center text-sm text-gray-600 mt-4">
        Have an account? 
        <a href="login.php" class="link linkfont-semibold">Log In here</a>
      </p>

    </form>
  </div>
</div>

<script src="../assets/js/validation.js"></script>