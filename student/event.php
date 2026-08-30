<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>
<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

$eventId = intval($_GET['id'] ?? 0);

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
        WHERE e.status = 'published' 
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

include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>
<link rel = "stylesheet" href = "../assets/css/student.css">

<main class = "event-page">
<div class ="event-container">
<div class = "left-content">
    <div class = "event-title">
        <h3>Campus Food Carnival</h3>
        <h3><?php echo htmlspecialchars($event['title'] ?? 'Campus Event'); ?></h3>
    </div>
    
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
      <div style="background-color: #dcfce7; color: #15803d; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
        🎉 Registration successful! See you at the event.
      </div>
    <?php elseif ($isRegistered): ?>
      <div style="background-color: #e0f2fe; color: #0369a1; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-weight: 600;">
        ✓ You have already registered for this event.
      </div>
    <?php endif; ?>

    <div class = "date-time">
        <img src = "https://static.vecteezy.com/system/resources/previews/004/397/047/non_2x/clock-icon-clock-time-symbol-flat-style-design-web-site-icon-logo-app-ui-illustration-eps10-free-vector.jpg">
        <h4>13/09/2026 12:00 pm onwards</h4>
        <h4><?php echo !empty($event['start_time']) ? date('d/m/Y h:i A', strtotime($event['start_time'])) . ' onwards' : 'TBD'; ?></h4>
    </div>
    <div class = "location">
        <img src ="https://static.vecteezy.com/system/resources/thumbnails/000/552/683/small/location_pin_002.jpg">
        <h4>University grounds</h4>
       
        <h4><?php echo htmlspecialchars($event['venue'] ?? 'NSBM Green University'); ?></h4>
    </div>

    <?php if (!$isRegistered): ?>
    <div class = "registration">
        <form class = "form-register">
        <form class = "form-register" action="register-event-process.php" method="POST">
            <input type="hidden" name="event_id" value="<?php echo $event['event_id'] ?? 1; ?>">

            <label>Name: </label>
            <input type = "text" id = "fname" name = "fname" placeholder = "Enter your full name">
            <input type = "text" id = "fname" name = "fname" placeholder = "Enter your full name" value="<?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>" required>
            
            <label>Email: </label>
            <input type = "email" id = "emailadd" name = "emailadd" placeholder = "Enter your email address">
            <input type = "email" id = "emailadd" name = "emailadd" placeholder = "Enter your email address" value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?>" required>
            
            <label>Contact number: </label>
            <input type = "text" id = "contnumber" placeholder = "Enter your contact number">
            <input type = "text" id = "contnumber" name = "contnumber" placeholder = "Enter your contact number" required>
            
            <label>Student ID: </label>
            <input type = "text" id = "stid" placeholder = "Enter your student ID">
            <input type = "text" id = "stid" name = "stid" placeholder = "e.g. 10023456" required>
            
            <label>Batch: </label>
            <input type = "text" id = "batchno" placeholder = "Enter your student batch number">
            <input type = "text" id = "batchno" name = "batchno" placeholder = "e.g. 24.1" required>
            
            <label class="form-title-label">Year: </label>
<div class="radio-options">
    <div class="radio-item">
        <input type="radio" id="year1" name="year" value="year1">
        <label for="year1">Year 1</label>
    </div>
    <div class="radio-item">
        <input type="radio" id="year2" name="year" value="year2">
        <label for="year2">Year 2</label>
    </div>
    <div class="radio-item">
        <input type="radio" id="year3" name="year" value="year3">
        <label for="year3">Year 3</label>
    </div>
    <div class="radio-item">
        <input type="radio" id="year4" name="year" value="year4">
        <label for="year4">Year 4</label>
    </div>
</div>
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
            
            
          <button type="button" class="btn btn-success text-white">Register here!</button>
            <button type="submit" class="btn btn-success text-white" style="margin-top: 12px;">Register here!</button>
        </form>
    </div>
    <?php endif; ?>

    <div class = "about-event">
        <p>A celebration of food, fun, and friendship! 🍕🌮🍰 Join us for our Campus Food Carnival and enjoy a variety of delicious foods, exciting stalls, fun activities, and great music—all in one vibrant campus experience.</p>
        <p><?php echo nl2br(htmlspecialchars($event['description'] ?? 'Event details coming soon.')); ?></p>
    </div>
    <div class="community-header">
      <div class="community-name">
        <h4>Hosted by: Marketing circle</h4>
        <h4>Hosted by: <?php echo htmlspecialchars($event['community_name'] ?? 'NSBM Student Association'); ?></h4>
      </div>
    </div>
  </div>

  <div class="right-content">
    <div class="event-img">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTK7QIbUEIvLg7UOBOpVEd-C-NrbQ7jBhu7SHIrpAbL7n771o4FeS4Od_E&s=10" alt="event">
      <img src="<?php echo htmlspecialchars($event['banner_image_url'] ?? 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800'); ?>" alt="<?php echo htmlspecialchars($event['title'] ?? 'Event'); ?>">
    </div>
  </div>
</div>
</main>

<?php include '../includes/footer.php'; ?>