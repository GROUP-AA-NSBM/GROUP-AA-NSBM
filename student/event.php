<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

// get event id from url
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// register for event
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requireLogin();

    // form values
    $user_id   = $_SESSION['user_id'];
    $name      = $_POST['fname'];
    $email     = $_POST['emailadd'];
    $faculty   = $_POST['faculty'];
    $phone     = $_POST['contnumber'];
    $st_id     = $_POST['stid'];
    $batch     = $_POST['batchno'];
    $year      = $_POST['year'];

    // check if already registered
    $stmt = $pdo->prepare("SELECT registration_id FROM event_registrations WHERE event_id = ? AND user_id = ?");
    $stmt->execute([$event_id, $user_id]);
    
    if ($stmt->fetch()) {
        header("Location: event.php?id=$event_id&status=already_registered");
        exit;
    }

    // insert registration
    $query = $pdo->prepare("INSERT INTO event_registrations (event_id, user_id, student_name, student_email, faculty, contact_number, student_id, batch, academic_year, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'registered')");
    $query->execute([$event_id, $user_id, $name, $email, $faculty, $phone, $st_id, $batch, $year]);

    header("Location: event.php?id=$event_id&status=success");
    exit;
}

// load event data
$stmt = $pdo->prepare("SELECT * FROM events WHERE event_id = ?");
$stmt->execute([$event_id]);
$event = $stmt->fetch();

if (!$event) {
    $event = $pdo->query("SELECT * FROM events ORDER BY start_time ASC LIMIT 1")->fetch();
}

$com_name = "";
if (!empty($event['community_id'])) {
    $stmt = $pdo->prepare("SELECT name FROM communities WHERE community_id = ?");
    $stmt->execute([$event['community_id']]);
    $com = $stmt->fetch();
    if ($com) {
        $com_name = $com['name'];
    }
}

$already_registered = false;
if (isLoggedIn() && $event) {
    $stmt = $pdo->prepare("SELECT registration_id FROM event_registrations WHERE event_id = ? AND user_id = ?");
    $stmt->execute([$event['event_id'], $_SESSION['user_id']]);
    if ($stmt->fetch()) {
        $already_registered = true;
    }
}

include __DIR__ . '/../includes/header.php'; 
if (isLoggedIn()) {
    include __DIR__ . '/../includes/navbar.php'; 
} else {
    include __DIR__ . '/../includes/not-loggedin-navbar.php'; 
}
?>
<link rel = "stylesheet" href = "../assets/css/student.css">

<main class = "event-page">
<div class ="event-box">
<div class = "left-content">
    <div class = "event-title">
        <h3><?php echo htmlspecialchars($event['title'] ?? 'Campus Event'); ?></h3>
    </div>
    
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
      <div style="background-color: #ffffff; color: #16a34a; margin-bottom: 16px; font-weight: 600; font-size: 1rem;">
        Registration successful! See you at the event.
      </div>
    <?php elseif ($already_registered): ?>
      <p style="color: #0369a1; font-weight: 600; margin-bottom: 16px;">
        You have already registered for this event.
      </p>
    <?php endif; ?>

    <div class = "date-time">
        <img src = "https://static.vecteezy.com/system/resources/previews/004/397/047/non_2x/clock-icon-clock-time-symbol-flat-style-design-web-site-icon-logo-app-ui-illustration-eps10-free-vector.jpg">
        <h4><?php echo !empty($event['start_time']) ? date('d/m/Y h:i A', strtotime($event['start_time'])) . ' onwards' : 'TBD'; ?></h4>
    </div>
    <div class = "location">
        <img src ="https://static.vecteezy.com/system/resources/thumbnails/000/552/683/small/location_pin_002.jpg">
        <h4 style="color: #19589D;"><?php echo htmlspecialchars($event['venue'] ?? 'NSBM Green University'); ?></h4>
    </div>

    <?php if (!isLoggedIn()): ?>
      <div class="registration" style="padding: 24px; background: #f8fafc; border: 1px solid #d1d5db; border-radius: 12px; margin-bottom: 24px;">
        <center>
          <h4 style="font-size: 1.125rem; font-weight: 700; color: #000000; margin-bottom: 6px;">Want to register for this event?</h4>
          <p style="font-size: 0.875rem; color: #111827; margin-bottom: 16px;">Sign in with your email to book your slot.</p>
          <a href="/GROUP-AA-NSBM/auth/login.php" class="btn btn-primary btn-sm" style="padding: 0 24px;">Log In to Register</a>
          <p style="font-size: 0.8rem; color: #111827; margin-top: 10px;">
            Don't have an account? <a href="/GROUP-AA-NSBM/auth/register.php" style="color: #39B54A; text-decoration: underline; font-weight: 600;">Create one here</a>
          </p>
        </center>
      </div>
    <?php elseif (!$already_registered): ?>
    <div class = "registration">
        <form class = "form-register" action="" method="POST">
            <input type="hidden" name="event_id" value="<?php echo $event['event_id'] ?? 1; ?>">

            <label>Name: </label>
            <input type = "text" id = "fname" name = "fname" placeholder = "Enter your full name" required>
            
            <label>Email: </label>
            <input type = "email" id = "emailadd" name = "emailadd" placeholder = "Enter your email address" required>
            
            <label>Faculty: </label>
            <select id = "faculty" name = "faculty" required style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 8px; margin-bottom: 12px; background: white; font-size: 0.95rem;">
                <option value="" disabled selected>Select your Faculty</option>
                <option value="Faculty of Computing">Faculty of Computing</option>
                <option value="Faculty of Business">Faculty of Business</option>
                <option value="Faculty of Engineering">Faculty of Engineering</option>
                <option value="Faculty of Science">Faculty of Science</option>
            </select>
            
            <label>Contact number: </label>
            <input type = "text" id = "contnumber" name = "contnumber" placeholder = "Enter your contact number" required>
            
            <label>Student ID: </label>
            <input type = "text" id = "stid" name = "stid" placeholder = "e.g. 10023456" required>
            
            <label>Batch: </label>
            <input type = "text" id = "batchno" name = "batchno" placeholder = "e.g. 24.1" required>
            
            <label class="form-title-label">Year: </label>
            <div class="radio-options">
                <div class="radio-item">
                    <input type="radio" id="year1" name="year" value="Year 1" checked>
                    <label for="year1">Year 1</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="year2" name="year" value="Year 2">
                    <label for="year2">Year 2</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="year3" name="year" value="Year 3">
                    <label for="year3">Year 3</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="year4" name="year" value="Year 4">
                    <label for="year4">Year 4</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary text-white shadow-none" style="margin-top: 12px; box-shadow: none !important; width: 94%; height: 42px; min-height: 42px; padding: 9px 21px;">Register here</button>
        </form>
    </div>
    <?php endif; ?>

    <div class = "about-event">
        <p><?php echo nl2br(htmlspecialchars($event['description'] ?? 'Event details coming soon.')); ?></p>
    </div>
    <?php if (!empty($communityName)): ?>
    <div class="community-header">
      <div class="community-name">
        <h4>Hosted by: <span style="color: #39B54A; font-weight: 700;"><?php echo htmlspecialchars($communityName); ?></span></h4>
      </div>
    </div>
    <?php endif; ?>
  </div>

  <div class="right-content">
    <div class="event-img">
      <img src="<?php echo htmlspecialchars($event['banner_image_url'] ?? 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800'); ?>" alt="<?php echo htmlspecialchars($event['title'] ?? 'Event'); ?>">
    </div>
  </div>
</div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>