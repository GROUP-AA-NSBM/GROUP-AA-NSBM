<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$eventId = 0;
if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']);
} elseif (isset($_POST['event_id'])) {
    $eventId = intval($_POST['event_id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requireLogin();

    $userId       = $_SESSION['user_id'] ?? 0;
    $studentName  = trim($_POST['fname'] ?? '');
    $studentEmail = trim($_POST['emailadd'] ?? '');
    $faculty      = trim($_POST['faculty'] ?? '');
    $contactNo    = trim($_POST['contnumber'] ?? '');
    $studentId    = trim($_POST['stid'] ?? '');
    $batch        = trim($_POST['batchno'] ?? '');
    $year         = trim($_POST['year'] ?? '');

    if ($eventId > 0 && $userId > 0) {
        $checkStmt = $pdo->prepare('SELECT registration_id FROM event_registrations WHERE event_id = ? AND user_id = ? LIMIT 1');
        $checkStmt->execute([$eventId, $userId]);
        
        if ($checkStmt->fetch()) {
            header('Location: event.php?id=' . $eventId . '&status=already_registered');
            exit;
        }

        $insertStmt = $pdo->prepare('INSERT INTO event_registrations (event_id, user_id, student_name, student_email, faculty, contact_number, student_id, batch, academic_year, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, "registered")');
        $insertStmt->execute([$eventId, $userId, $studentName, $studentEmail, $faculty, $contactNo, $studentId, $batch, $year]);

        header('Location: event.php?id=' . $eventId . '&status=success');
        exit;
    }
}

if ($eventId > 0) {
    $stmt = $pdo->prepare("
        SELECT e.*, c.name AS category_name, com.name AS community_name 
        FROM events e 
        LEFT JOIN event_categories ec ON e.event_id = ec.event_id 
        LEFT JOIN categories c ON ec.category_id = c.category_id 
        LEFT JOIN communities com ON e.community_id = com.community_id 
        WHERE e.event_id = ? 
        LIMIT 1
    ");
    $stmt->execute([$eventId]);
    $event = $stmt->fetch();
}

if (empty($event)) {
    // Fallback to latest published event
    $event = $pdo->query("
        SELECT e.*, c.name AS category_name, com.name AS community_name 
        FROM events e 
        LEFT JOIN event_categories ec ON e.event_id = ec.event_id 
        LEFT JOIN categories c ON ec.category_id = c.category_id 
        LEFT JOIN communities com ON e.community_id = com.community_id 
        ORDER BY e.start_time ASC 
        LIMIT 1
    ")->fetch();
}

$isRegistered = false;
if (isLoggedIn() && !empty($event)) {
    $regCheck = $pdo->prepare("SELECT registration_id FROM event_registrations WHERE event_id = ? AND user_id = ? LIMIT 1");
    $regCheck->execute([$event['event_id'], $_SESSION['user_id']]);
    if ($regCheck->fetch()) {
        $isRegistered = true;
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
<div class ="event-container">
<div class = "left-content">
    <div class = "event-title">
        <h3><?php echo htmlspecialchars($event['title'] ?? 'Campus Event'); ?></h3>
    </div>
    
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
      <div style="background-color: #dcfce7; color: #15803d; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
        Registration successful! See you at the event.
      </div>
    <?php elseif ($isRegistered): ?>
      <div style="background-color: #e0f2fe; color: #0369a1; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
        You have already registered for this event.
      </div>
    <?php endif; ?>

    <div class = "date-time">
        <img src = "https://static.vecteezy.com/system/resources/previews/004/397/047/non_2x/clock-icon-clock-time-symbol-flat-style-design-web-site-icon-logo-app-ui-illustration-eps10-free-vector.jpg">
        <h4><?php echo !empty($event['start_time']) ? date('d/m/Y h:i A', strtotime($event['start_time'])) . ' onwards' : 'TBD'; ?></h4>
    </div>
    <div class = "location">
        <img src ="https://static.vecteezy.com/system/resources/thumbnails/000/552/683/small/location_pin_002.jpg">
        <h4><?php echo htmlspecialchars($event['venue'] ?? 'NSBM Green University'); ?></h4>
    </div>

    <?php if (!isLoggedIn()): ?>
      <div class="registration" style="padding: 24px; background: #f8fafc; border: 1px solid #d1d5db; border-radius: 12px; text-align: center; margin-bottom: 24px;">
        <h4 style="font-size: 1.125rem; font-weight: 700; color: #000000; margin-bottom: 6px;">Want to register for this event?</h4>
        <p style="font-size: 0.875rem; color: #111827; margin-bottom: 16px;">Sign in with your NSBM student email to book your slot.</p>
        <a href="/GROUP-AA-NSBM/auth/login.php" class="btn btn-primary btn-sm" style="padding: 0 24px;">Log In to Register</a>
        <p style="font-size: 0.8rem; color: #111827; margin-top: 10px;">
          Don't have an account? <a href="/GROUP-AA-NSBM/auth/register.php" style="color: #39B54A; text-decoration: underline; font-weight: 600;">Create one here</a>
        </p>
      </div>
    <?php elseif (!$isRegistered): ?>
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
            
            <button type="submit" class="btn btn-success text-white" style="margin-top: 12px;">Register here!</button>
        </form>
    </div>
    <?php endif; ?>

    <div class = "about-event">
        <p><?php echo nl2br(htmlspecialchars($event['description'] ?? 'Event details coming soon.')); ?></p>
    </div>
    <div class="community-header">
      <div class="community-name">
        <h4>Hosted by: 
          <?php if (!empty($event['community_name'])): ?>
            <a href="/GROUP-AA-NSBM/index.php#communities" style="color: #39B54A; text-decoration: underline; font-weight: 700;">
              <?php echo htmlspecialchars($event['community_name']); ?>
            </a>
          <?php else: ?>
            <span>NSBM Student Association</span>
          <?php endif; ?>
        </h4>
      </div>
    </div>
  </div>

  <div class="right-content">
    <div class="event-img">
      <img src="<?php echo htmlspecialchars($event['banner_image_url'] ?? 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800'); ?>" alt="<?php echo htmlspecialchars($event['title'] ?? 'Event'); ?>">
    </div>
  </div>
</div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>