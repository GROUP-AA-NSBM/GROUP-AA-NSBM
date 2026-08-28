<?php 
require_once __DIR__ . '/../includes/db.php'; 
require_once __DIR__ . '/../includes/auth.php';

// Enforce login check: if logged in -> stays here; if not -> redirected to login page
requireLogin();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/navbar.php'; 
?>

<div class="container max-w-4xl mx-auto p-6 my-10">
    <div class="card bg-base-100 border border-gray-200 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Event Registration</h1>
        <p class="text-gray-600 mb-6">You are logged in. Complete your registration for upcoming NSBM university events.</p>
        <div>
            <a href="/GROUP-AA-NSBM/index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
