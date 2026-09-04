<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = trim($_POST['title'] ?? '');
    $categoryId  = intval($_POST['category_id'] ?? 0);
    $communityId = !empty($_POST['community_id']) ? intval($_POST['community_id']) : null;
    $location    = trim($_POST['location'] ?? '');
    $eventDate   = trim($_POST['event_date'] ?? '');
    $eventTime   = trim($_POST['event_time'] ?? '');
    $description = trim($_POST['description'] ?? '');

    $startTime = $eventDate . ' ' . $eventTime . ':00';
    $bannerUrl = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800';

    if (!empty($_FILES['banner']['name'])) {
        $uploadDir = __DIR__ . '/../uploads/events/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = time() . '_' . basename($_FILES['banner']['name']);
        $targetPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['banner']['tmp_name'], $targetPath)) {
            $bannerUrl = '/GROUP-AA-NSBM/uploads/events/' . $fileName;
        }
    }

    if (!empty($title) && !empty($location) && !empty($eventDate)) {
        $stmt = $pdo->prepare('INSERT INTO events (title, description, community_id, venue, start_time, banner_image_url) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$title, $description, $communityId, $location, $startTime, $bannerUrl]);
        $eventId = $pdo->lastInsertId();

        if ($categoryId > 0) {
            $catStmt = $pdo->prepare('INSERT INTO event_categories (event_id, category_id) VALUES (?, ?)');
            $catStmt->execute([$eventId, $categoryId]);
        }

        header('Location: manage-events.php?status=created');
        exit;
    } else {
        $errorMessage = 'Please fill in all required fields.';
    }
}

$categories  = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
$communities = $pdo->query("SELECT * FROM communities ORDER BY name ASC")->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-primary">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="announcements.php" class="btn btn-ghost">Announcements</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-form-container">
  
      <div class="admin-header">
        <div>
          <h1 class="admin-title">Create New Event</h1>
        </div>
      </div>

      <?php if (!empty($errorMessage)): ?>
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
          <?php echo htmlspecialchars($errorMessage); ?>
        </div>
      <?php endif; ?>

      <div class="card">
        <form id="createEventForm" action="" method="POST" enctype="multipart/form-data" class="card-body" style="display: flex; flex-direction: column; gap: 16px;">
   
          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Event Title</span></label>
            <input type="text" name="title" id="eventTitle" placeholder="e.g. NSBM Tech Fiesta 2026" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="admin-form-grid">
            
            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Category</span></label>
              <select name="category_id" id="eventCategory" class="select select-bordered" style="width: 100%;" required>
                <option value="" disabled selected>Select a category</option>
                <?php foreach ($categories as $cat): ?>
                  <option value="<?php echo $cat['category_id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Hosting Community / Club</span></label>
              <select name="community_id" id="eventCommunity" class="select select-bordered" style="width: 100%;">
                <option value="">None / Independent</option>
                <?php foreach ($communities as $com): ?>
                  <option value="<?php echo $com['community_id']; ?>"><?php echo htmlspecialchars($com['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Venue / Location</span></label>
            <input type="text" name="location" id="eventLocation" placeholder="e.g. Auditorium / Main Ground" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="admin-form-grid">
            
            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Event Date</span></label>
              <input type="date" name="event_date" id="eventDate" class="input input-bordered" style="width: 100%;" required />
            </div>

            <div class="form-control">
              <label class="label"><span style="font-weight: 600;">Start Time</span></label>
              <input type="time" name="event_time" id="eventTime" class="input input-bordered" style="width: 100%;" required />
            </div>

          </div>

          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Description</span></label>
            <textarea name="description" id="eventDescription" rows="4" placeholder="Provide event details, schedule, agenda, or guidelines..." class="textarea textarea-bordered" style="width: 100%;" required></textarea>
          </div>

          <div class="form-control">
            <label class="label"><span style="font-weight: 600;">Event Banner / Poster</span></label>
            <input type="file" name="banner" id="eventBanner" accept="image/*" class="file-input file-input-bordered" style="width: 100%;" />
          </div>

          <div style="padding-top: 16px;">
            <button type="submit" class="btn admin-btn-black" style="width: 100%; font-size: 1.125rem;">
              Publish Event
            </button>
          </div>

        </form>
      </div>
    </div>

  </main>
</div>

<script src="../assets/js/admin.js"></script>