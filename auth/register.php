<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['Uname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($password)) {
        $checkStmt = $pdo->prepare('SELECT user_id FROM users WHERE email = ?');
        $checkStmt->execute([$email]);

        if ($checkStmt->fetch()) {
            $errorMessage = 'This email is already registered. Please log in.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $pdo->prepare('INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, "student")');
            $insertStmt->execute([$name, $email, $hashedPassword]);

            $_SESSION['user_id']    = $pdo->lastInsertId();
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

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/not-loggedin-navbar.php'; 
?>

<div class="min-h-screen flex items-center justify-center px-4 py-12" style="background-color: #ffffff;">
  <div class="card bg-base-100 w-full max-w-md shadow-none" style="border: 1px solid #e5e7eb;">
    <form id="registerForm" action="" method="POST" class="card-body">
      
      <div class="text-center mb-4">
        <h2 class="text-3xl font-extrabold text-black">Welcome</h2>
        <p class="text-sm text-gray-900 font-medium mt-1">Sign up to NSBM Event Hub</p>
      </div>

      <?php if (!empty($errorMessage)): ?>
        <p style="color: red; text-align: center; font-weight: bold; margin-bottom: 12px;">
          <?php echo htmlspecialchars($errorMessage); ?>
        </p>
      <?php endif; ?>

      <div class="form-control">
        <label class="label">
          <span class="label-text font-semibold">Name</span>
        </label>
        <input 
          type="text" 
          id="regName"
          name="Uname" 
          placeholder="type your name here" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control">
        <label class="label">
          <span class="label-text font-semibold">Email Address</span>
        </label>
        <input 
          type="email" 
          id="regEmail"
          name="email" 
          placeholder="type your email here" 
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
          placeholder="type your password here" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn btn-primary text-lg border-none w-full">
          Sign Up
        </button>
      </div>

      <p class="text-center text-sm text-gray-900 mt-4">
        Have an account? 
        <a href="login.php" class="link font-semibold text-primary">Log In here</a>
      </p>

    </form>
  </div>
</div>