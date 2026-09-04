<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireLogin();

if (isAdmin()) {
    header("Location: /GROUP-AA-NSBM/admin/dashboard.php");
    exit;
}

$userStmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1");
$userStmt->execute([$_SESSION['user_id']]);
$user = $userStmt->fetch();

$regEventsStmt = $pdo->prepare("
    SELECT e.*, r.status AS reg_status 
    FROM event_registrations r 
    JOIN events e ON r.event_id = e.event_id 
    WHERE r.user_id = ? 
    ORDER BY r.registration_id DESC
");
$regEventsStmt->execute([$_SESSION['user_id']]);
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
    <h3><?php echo htmlspecialchars($user['full_name'] ?? $_SESSION['user_name'] ?? 'Student'); ?></h3>
</div>
<div class = "joined-date">
    <h6>Joined <?php echo !empty($user['created_at']) ? date('F Y', strtotime($user['created_at'])) : '2026'; ?></h6>
</div>
<div class = "st-email">
    <h6><?php echo htmlspecialchars($user['email'] ?? $_SESSION['user_email'] ?? ''); ?></h6>
</div>
<div class = "faculty">
    <h6>Faculty of <?php echo htmlspecialchars(!empty($user['faculty']) ? $user['faculty'] : 'Computing'); ?></h6>
</div>
<div style="margin-top: 10px;">
    <a href="../auth/logout.php" class="btn btn-outline btn-error btn-xs">Log Out</a>
</div>
</div>
</div>

<div class = "profile-events">
    <ul>
        <li><button class = "tab-btn active" data-tab = "registered">Registered events (<?php echo count($registeredEvents); ?>)</button></li>
        <li><button class = "tab-btn" data-tab="attended">Attended events</button></li>
        <li><button class = "tab-btn" data-tab = "following">Following</button></li>
    </ul>
</div>

<div id = "registered" class = "tab-content active" style="display: flex; flex-wrap: wrap; gap: 16px;">
  <?php if (empty($registeredEvents)): ?>
    <p style="color: #111827; font-weight: 500; padding: 16px;">You have not registered for any campus events yet. Explore upcoming events on the homepage!</p>
  <?php else: ?>
    <?php foreach ($registeredEvents as $rev): ?>
      <div class="card bg-base-100 shadow-sm" style="width: 280px; border: 1px solid #e5e7eb;">
        <figure style="height: 140px; overflow: hidden;">
          <img
            src="<?php echo htmlspecialchars(!empty($rev['banner_image_url']) ? $rev['banner_image_url'] : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800'); ?>"
            alt="<?php echo htmlspecialchars($rev['title']); ?>" 
            style="width: 100%; height: 100%; object-fit: cover;" />
        </figure>
        <div class="card-body" style="padding: 16px;">
          <h2 class="card-title text-base text-black"><?php echo htmlspecialchars($rev['title']); ?></h2>
          <p class="text-xs text-gray-900 font-medium">🗓️ <?php echo date('M d, Y', strtotime($rev['start_time'])); ?></p>
          <p class="text-xs text-gray-900 font-medium">📍 <?php echo htmlspecialchars($rev['venue']); ?></p>
          <div class="card-actions justify-end" style="margin-top: 8px;">
            <a href="event.php?id=<?php echo $rev['event_id']; ?>" class="btn btn-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<div id="attended" class="tab-content" style="padding: 16px;">
  <p style="color: #111827; font-weight: 500;">No past attended events yet. Events will appear here once marked as attended.</p>
</div>

<div id="following" class="tab-content" style="display: flex; flex-wrap: wrap; gap: 16px; padding: 16px 0;">
  <?php 
  $communities = $pdo->query("SELECT * FROM communities ORDER BY name ASC LIMIT 4")->fetchAll();
  if (empty($communities)): ?>
    <p style="color: #111827; font-weight: 500;">No clubs or communities followed yet.</p>
  <?php else: ?>
    <?php foreach ($communities as $com): ?>
      <div class="card bg-base-100 shadow-sm" style="width: 240px; border: 1px solid #e5e7eb;">
        <div class="card-body" style="padding: 16px; text-align: center;">
          <h2 class="card-title text-sm justify-center text-black" style="margin: 0;"><?php echo htmlspecialchars($com['name']); ?></h2>
          <p class="text-xs text-gray-900 font-medium" style="margin-top: 4px;"><?php echo htmlspecialchars($com['faculty'] ?? 'University Wide'); ?></p>
          <div class="card-actions justify-center" style="margin-top: 12px;">
            <button class="btn btn-outline btn-xs">Following</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const targetTab = button.getAttribute('data-tab');

        
        buttons.forEach(btn => btn.classList.remove('active'));

        contents.forEach(content => content.classList.remove('active'));

        button.classList.add('active');

        const activeContent = document.getElementById(targetTab);
        if (activeContent) {
          activeContent.classList.add('active');
        }
      });
    });
  });
</script>
<?php include __DIR__ . '/../includes/footer.php'; ?>