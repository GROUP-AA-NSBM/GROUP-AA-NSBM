<?php require_once '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/not-loggedin-navbar.php'; ?>

<?php
$communityName = $_GET['name'] ?? 'University Community';
?>

<div class="max-w-4xl mx-auto px-4 py-12">
  <div class="card bg-base-100 shadow-md p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo htmlspecialchars($communityName); ?></h1>
    <p class="text-gray-600 mb-6">
      Welcome to the official page of <?php echo htmlspecialchars($communityName); ?> at NSBM Green University.
      Discover upcoming community events, announcements, and member activities.
    </p>
    <div>
      <a href="/GROUP-AA-NSBM/index.php" class="btn btn-primary">Back to Home</a>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
