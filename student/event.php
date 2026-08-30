<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>
<link rel = "stylesheet" href = "../assets/css/student.css">

<main class = "event-page">
<div class ="event-container">
<div class = "left-content">
    <div class = "event-title">
        <h3>Campus Food Carnival</h3>
    </div>
    <div class = "date-time">
        <img src = "https://static.vecteezy.com/system/resources/previews/004/397/047/non_2x/clock-icon-clock-time-symbol-flat-style-design-web-site-icon-logo-app-ui-illustration-eps10-free-vector.jpg">
        <h4>13/09/2026 12:00 pm onwards</h4>
    </div>
    <div class = "location">
        <img src ="https://static.vecteezy.com/system/resources/thumbnails/000/552/683/small/location_pin_002.jpg">
        <h4>University grounds</h4>
       
    </div>
    <div class = "registration">
        <form class = "form-register">
            <label>Name: </label>
            <input type = "text" id = "fname" name = "fname" placeholder = "Enter your full name">
            <label>Email: </label>
            <input type = "email" id = "emailadd" name = "emailadd" placeholder = "Enter your email address">
            <label>Contact number: </label>
            <input type = "text" id = "contnumber" placeholder = "Enter your contact number">
            <label>Student ID: </label>
            <input type = "text" id = "stid" placeholder = "Enter your student ID">
            <label>Batch: </label>
            <input type = "text" id = "batchno" placeholder = "Enter your student batch number">
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
            
            
          <button type="button" class="btn btn-success text-white">Register here!</button>
        </form>
    </div>
    <div class = "about-event">
        <p>A celebration of food, fun, and friendship! 🍕🌮🍰 Join us for our Campus Food Carnival and enjoy a variety of delicious foods, exciting stalls, fun activities, and great music—all in one vibrant campus experience.</p>
    </div>
    <div class="community-header">
      <div class="community-name">
        <h4>Hosted by: Marketing circle</h4>
      </div>
    </div>
  </div>

  <div class="right-content">
    <div class="event-img">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTK7QIbUEIvLg7UOBOpVEd-C-NrbQ7jBhu7SHIrpAbL7n771o4FeS4Od_E&s=10" alt="event">
    </div>
  </div>
</div>
</main>

<?php include '../includes/footer.php'; ?>