<?php
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['action'])) {
    session_unset();
    session_destroy();
    header("Location: /GROUP-AA-NSBM/index.php");
    exit;
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/not-loggedin-navbar.php';
?>

<div class="min-h-screen bg-base-200 flex items-center justify-center px-4 py-12">
  <div class="card bg-base-100 w-full max-w-md border border-gray-200">
    <form action="logout.php" method="POST" class="card-body">
      
      <div class="text-center mb-4">
        <h2 class="text-3xl font-extrabold">Log Out</h2>
        <p class="text-sm text-gray-500 mt-1">Are you sure you want to log out?</p>
      </div>

      <div class="form-control mt-6">
        <button type="submit" class="btn btn-primary text-lg border-none w-full">
          Confirm Log Out
        </button>
      </div>

      <p class="text-center text-sm text-gray-600 mt-4">
        Return to
        <a href="/GROUP-AA-NSBM/index.php" class="link font-semibold">Home</a>
      </p>

    </form>
  </div>
</div>