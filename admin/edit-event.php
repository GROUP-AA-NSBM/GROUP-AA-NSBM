<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
requireAdmin();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = $_POST['title'];
    $cat_id      = intval($_POST['category_id']);
    $com_id      = !empty($_POST['community_id']) ? intval($_POST['community_id']) : null;
    $location    = $_POST['location'];
    $date        = $_POST['event_date'];
    $time        = $_POST['event_time'];
    $description = $_POST['description'];

    $start_time = $date . ' ' . $time . ':00';

    if ($id > 0 && !empty($title) && !empty($location) && !empty($date)) {
        if (!empty($_FILES['banner']['name'])) {
            $target_dir = __DIR__ . '/../uploads/events/';
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $filename    = time() . '_' . basename($_FILES['banner']['name']);
            $target_file = $target_dir . $filename;
            if (move_uploaded_file($_FILES['banner']['tmp_name'], $target_file)) {
                $image = '/GROUP-AA-NSBM/uploads/events/' . $filename;
                $image = BASE_URL . '/uploads/events/' . $filename;
                $stmt = $pdo->prepare('UPDATE events SET title = ?, description = ?, category_id = ?, community_id = ?, venue = ?, start_time = ?, banner_image_url = ? WHERE event_id = ?');
                $stmt->execute([$title, $description, $cat_id, $com_id, $location, $start_time, $image, $id]);
            }
        } else {
            $stmt = $pdo->prepare('UPDATE events SET title = ?, description = ?, category_id = ?, community_id = ?, venue = ?, start_time = ? WHERE event_id = ?');
            $stmt->execute([$title, $description, $cat_id, $com_id, $location, $start_time, $id]);
        }

        header('Location: manage-events.php?status=updated');
        exit;
    }
}

$stmt = $pdo->prepare("SELECT * FROM events WHERE event_id = ?");
$stmt->execute([$id]);
$event = $stmt->fetch();

if (!$event) {
    header("Location: manage-events.php?error=not_found");
    exit;
}

$categories  = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
$communities = $pdo->query("SELECT * FROM communities ORDER BY name ASC")->fetchAll();

$date = date('Y-m-d', strtotime($event['start_time']));
$time = date('H:i', strtotime($event['start_time']));

include __DIR__ . '/../includes/header.php'; 
include __DIR__ . '/../includes/admin-navbar.php'; 
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-page">
  
  <aside class="admin-sidebar">
    <h2 class="admin-sidebar-title">Admin Panel</h2>
    <nav class="admin-nav">
      <a href="dashboard.php" class="btn btn-ghost">Dashboard</a>
      <a href="manage-events.php" class="btn btn-primary">Manage Events</a>
      <a href="create-event.php" class="btn btn-ghost">Create Event</a>
      <a href="categories.php" class="btn btn-ghost">Categories</a>
      <a href="communities.php" class="btn btn-ghost">Communities</a>
      <a href="registrations.php" class="btn btn-ghost">Registrations</a>
    </nav>
  </aside>

  <main class="admin-main">
    
    <div class="admin-form-box">
      <div class="admin-header">
        <div>
          <h1 class="admin-title">Edit Event</h1>
        </div>
      </div>

      <div class="card">
        <form id="editEventForm" action="" method="POST" enctype="multipart/form-data" class="card-body" style="display: flex; flex-direction: column; gap: 12px; padding: 20px;">
          
          <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">

          <div class="form-control">
            <label class="label"><b>Event Title</b></label>
            <input type="text" name="title" id="eventTitle" value="<?php echo htmlspecialchars($event['title']); ?>" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Category</b></label>
            <select name="category_id" id="eventCategory" class="select select-bordered" style="width: 100%;" required>
              <option value="" disabled>Select a category</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['category_id']; ?>" <?php echo ($cat['category_id'] == ($event['category_id'] ?? 0)) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($cat['name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-control">
            <label class="label"><b>Hosting Community / Club</b></label>
            <select name="community_id" id="eventCommunity" class="select select-bordered" style="width: 100%;">
              <option value="">None / Independent</option>
              <?php foreach ($communities as $com): ?>
                <option value="<?php echo $com['community_id']; ?>" <?php echo ($com['community_id'] == ($event['community_id'] ?? 0)) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($com['name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-control">
            <label class="label"><b>Venue / Location</b></label>
            <input type="text" name="location" id="eventLocation" value="<?php echo htmlspecialchars($event['venue']); ?>" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Event Date</b></label>
            <input type="date" name="event_date" id="eventDate" value="<?php echo $date; ?>" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Start Time</b></label>
            <input type="time" name="event_time" id="eventTime" value="<?php echo $time; ?>" class="input input-bordered" style="width: 100%;" required />
          </div>

          <div class="form-control">
            <label class="label"><b>Description</b></label>
            <textarea name="description" id="eventDescription" rows="4" class="textarea textarea-bordered" style="width: 100%;" required><?php echo htmlspecialchars($event['description']); ?></textarea>
          </div>

          <div class="form-control">
            <label class="label"><b>Update Banner (Optional)</b></label>
            <input type="file" name="banner" id="eventBanner" accept="image/*" class="file-input file-input-bordered" style="width: 100%;" />
          </div>

          <div class="admin-form-actions">
            <button type="submit" class="btn btn-primary" style="flex: 1; height: 43px; min-height: 43px; padding: 10px 22px;">Save Changes</button>
            <a href="manage-events.php" class="btn btn-ghost" style="height: 39px; min-height: 39px; padding: 7px 18px;">Cancel</a>
          </div>

        </form>
      </div>
    </div>

  </main>
</div>