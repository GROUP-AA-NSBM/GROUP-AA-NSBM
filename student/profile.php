<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireLogin();

if (isAdmin()) {
    header("Location: /GROUP-AA-NSBM/admin/dashboard.php");
    exit;
}

$userId = $_SESSION['user_id'];

$userStmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
$userStmt->execute([$userId]);
$user = $userStmt->fetch();

$regEventsStmt = $pdo->prepare("
    SELECT events.* 
    FROM event_registrations 
    JOIN events ON event_registrations.event_id = events.event_id 
    WHERE event_registrations.user_id = ? 
    ORDER BY event_registrations.registration_id DESC
");
$regEventsStmt->execute([$userId]);
$registeredEvents = $regEventsStmt->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/student.css">
    
<main class = "profile-page">
<div class = "profile-container">
<div class="avatar">
  <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring-2 ring-offset-2">
    <img alt="User Avatar" src="<?php echo htmlspecialchars(!empty($user['profile_pic_url']) ? $user['profile_pic_url'] : 'https://img.daisyui.com/images/profile/demo/spiderperson@192.webp'); ?>" />
  </div>
</div>
<div class = "profile-info">
<div class = "profile-name">
    <h3><?php echo htmlspecialchars($user['full_name']); ?></h3>
</div>
<div class = "st-email">
    <h6><?php echo htmlspecialchars($user['email']); ?></h6>
</div>
<div style="margin-top: 10px;">
    <a href="../auth/logout.php" class="btn btn-outline btn-error btn-xs">Log Out</a>
</div>
</div>
</div>

<div class = "profile-events" style="margin-bottom: 24px;">
    <h4 style="font-size: 1.25rem; font-weight: 700; color: #000000;">Registered Events</h4>
</div>

<div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; max-width: 1000px; margin: 0 auto 40px auto; padding: 0 16px;">
  <?php if (empty($registeredEvents)): ?>
    <p style="color: #111827; font-weight: 500; padding: 16px;">You have not registered for any campus events yet. Explore upcoming events on the homepage!</p>
  <?php else: ?>
    <?php foreach ($registeredEvents as $event): 
      $banner = !empty($event['banner_image_url']) ? $event['banner_image_url'] : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800';
    ?>
      <div class="card bg-base-100 shadow-sm" style="width: 280px; border: 1px solid #e5e7eb;">
        <figure style="height: 140px; overflow: hidden;">
          <img
            src="<?php echo htmlspecialchars($banner); ?>"
            alt="<?php echo htmlspecialchars($event['title']); ?>" 
            style="width: 100%; height: 100%; object-fit: cover;" />
        </figure>
        <div class="card-body" style="padding: 16px;">
          <h2 class="card-title text-base text-black"><?php echo htmlspecialchars($event['title']); ?></h2>
          <p class="text-xs text-gray-900 font-medium"><?php echo date('M d, Y', strtotime($event['start_time'])); ?></p>
          <p class="text-xs text-gray-900 font-medium"><?php echo htmlspecialchars($event['venue']); ?></p>
          <div class="card-actions justify-end" style="margin-top: 8px;">
            <a href="event.php?id=<?php echo $event['event_id']; ?>" class="btn btn-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
</main>
<?php include __DIR__ . '/../includes/footer.php'; ?>