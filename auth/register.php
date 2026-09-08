<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$error = '';

// handle registration form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['Uname'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    // validation
    if (!empty($name) && !empty($email) && !empty($pass)) {
        // check if user already exists
        $stmt = $pdo->prepare('SELECT user_id FROM users WHERE email = ?');
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $error = 'This email is already registered. Please log in.';
        } else {
            // hash password and insert
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, "student")');
            $stmt->execute([$name, $email, $hash]);

            // auto login session
            $_SESSION['user_id']    = $pdo->lastInsertId();
            $_SESSION['user_name']  = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['role']       = 'student';

            header('Location: /GROUP-AA-NSBM/index.php');
            exit;
        }
    } else {
        $error = 'Please fill in all required fields.';
    }
}

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/not-loggedin-navbar.php'; 
?>

<!-- Register Form -->
<div class="min-h-screen flex items-center justify-center px-4 py-12" style="background-color: #ffffff;">
  <div class="card bg-base-100 w-full max-w-md shadow-none" style="border: 1px solid #e5e7eb;">
    <form id="registerForm" action="" method="POST" class="card-body">
      
      <center>
        <h2 class="text-3xl font-extrabold text-black">Welcome</h2>
        <p class="text-sm font-medium mt-1" style="color: #19589D;">Sign up to NSBM Event Hub</p>
      </center>
      <br>

      <?php if (!empty($error)): ?>
        <center>
          <p style="color: red; margin-bottom: 12px;"><b><?php echo htmlspecialchars($error); ?></b></p>
        </center>
      <?php endif; ?>

      <div class="form-control">
        <label class="label">
          <b>Name</b>
        </label>
        <input 
          type="text" 
          id="regName"
          name="Uname" 
          placeholder="type your name here" 
          class="input input-bordered w-full" 
          required 
        />
      </div>

      <div class="form-control">
        <label class="label">
          <b>Email Address</b>
        </label>
        <input 
          type="email" 
          id="regEmail"
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
          id="regPassword"
          name="password" 
          placeholder="type your password here" 
          class="input input-bordered w-full" 
          required 
        />
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn btn-primary text-lg border-none" style="width: 97%; height: 47px; min-height: 47px; padding: 11px 22px;">
          Sign Up
        </button>
      </div>

      <center>
        <p class="text-sm text-gray-900" style="margin-top: 16px;">
          Have an account? 
          <a href="login.php" class="link font-semibold text-primary">Log In here</a>
        </p>
      </center>

    </form>
  </div>
</div>