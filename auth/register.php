<?php include '../includes/header.php'; ?>
<?php include '../includes/not-loggedin-navbar.php'; ?>


<div class="min-h-screen bg-base-200 flex items-center justify-center px-4 py-12">
  <div class="card bg-base-100 w-full max-w-md shadow-2xl">
    <form action="login-process.php" method="POST" class="card-body">
      
      <div class="text-center mb-4">
        <h2 class="text-3xl font-extrabold">Welcome</h2>
        <p class="text-sm text-gray-500 mt-1">Sign up to NSBM Event Hub</p>
      </div>


      <div class="form-control">
        <label class="label">
          <span class="label-text font-semibold">Name </span>
        </label>
        <input 
          type="Uname" 
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
          name="password" 
          placeholder="••••••••" 
          class="input input-bordered focus:input-primary w-full" 
          required 
        />
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn bg-black hover:bg-gray-800 text-white text-lg border-none w-full">
          Sign Up
        </button>
      </div>

      <p class="text-center text-sm text-gray-600 mt-4">
        Have an account? 
        <a href="register.php" class="link linkfont-semibold">Log In here</a>
      </p>

    </form>
  </div>
</div>