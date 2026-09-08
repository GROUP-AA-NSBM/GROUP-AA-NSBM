<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = $_POST['title'];
    $cat_id      = intval($_POST['category_id']);
    $com_id      = !empty($_POST['community_id']) ? intval($_POST['community_id']) : null;
    $location    = $_POST['location'];
    $date        = $_POST['event_date'];
    $time        = $_POST['event_time'];
    $description = $_POST['description'];

    $start_time = $date . ' ' . $time . ':00';
    $image      = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800';

    if (!empty($_FILES['banner']['name'])) {
        $target_dir = __DIR__ . '/../uploads/events/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $filename    = time() . '_' . basename($_FILES['banner']['name']);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES['banner']['tmp_name'], $target_file)) {
            $image = '/GROUP-AA-NSBM/uploads/events/' . $filename;
        }
    }

    if (!empty($title) && !empty($location) && !empty($date)) {
        $created_by = $_SESSION['user_id'] ?? 1;
        $stmt = $pdo->prepare('INSERT INTO events (title, description, category_id, community_id, venue, start_time, banner_image_url, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$title, $description, $cat_id, $com_id, $location, $start_time, $image, $created_by]);

        header('Location: manage-events.php?status=created');
        exit;
    } else {
        $error = 'Please fill in all required fields.';
    }
}

$categories  = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
$communities = $pdo->query("SELECT * FROM communities ORDER BY name ASC")->fetchAll();

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-page">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-ghost">Manage Events</a>
      <a href="create-event.php" class="btn btn-primary">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="communities.php" class="btn btn-ghost">Communities</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-form-box">
  
      <div class="admin-header">
        <div>
          <h1 class="admin-title">Create New Event</h1>
        </div>
      </div>

      <?php if (!empty($error)): ?>
        <p style="color: red; margin-bottom: 16px;">
          <b><?php echo htmlspecialchars($error); ?></b>
        </p>
      <?php endif; ?>

      <div class="card">
        <form id="createEventForm" action="" method="POST" enctype="multipart/form-data" class="card-body" style="display: flex; flex-direction: column; gap: 16px;">
   
          <div class="form-control">
            <label class="label"><b>Event Title</b></label>
            <input type="text" name="title" id="eventTitle" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Category</b></label>
            <select name="category_id" id="eventCategory" class="select select-bordered" style="width: 100%;" required>
              <option value="" disabled selected>Select a category</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['category_id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-control">
            <label class="label"><b>Hosting Community / Club</b></label>
            <select name="community_id" id="eventCommunity" class="select select-bordered" style="width: 100%;">
              <option value="">None / Independent</option>
              <?php foreach ($communities as $com): ?>
                <option value="<?php echo $com['community_id']; ?>"><?php echo htmlspecialchars($com['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-control">
            <label class="label"><b>Venue / Location</b></label>
            <input type="text" name="location" id="eventLocation" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Event Date</b></label>
            <input type="date" name="event_date" id="eventDate" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Start Time</b></label>
            <input type="time" name="event_time" id="eventTime" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Description</b></label>
            <textarea name="description" id="eventDescription" rows="4" class="textarea textarea-bordered" style="width: 100%;" required></textarea>
          </div>

          <div class="form-control">
            <label class="label"><b>Event Banner / Poster</b></label>
            <input type="file" name="banner" id="eventBanner" accept="image/*" class="file-input file-input-bordered" style="width: 100%;" />
          </div>

          <div style="padding-top: 16px;">
            <button type="submit" class="btn admin-btn-black" style="width: 96%; height: 46px; min-height: 46px; font-size: 1.05rem; padding: 11px 24px;">
              Publish Event
            </button>
          </div>

        </form>
      </div>
    </div>
  </main>
</div>