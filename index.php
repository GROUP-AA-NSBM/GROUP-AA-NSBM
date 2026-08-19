<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NSBM Event Hub</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="header">
      <nav>
        <a href="index1.html"><img src="assets/images/logo.png" width="100px" /></a>
        <div class="nav-links">
          <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">EVENTS</a></li>
            <li><a href="">CALENDAR</a></li>
            <li><a href="">CONTACT</a></li>
            <li><button type="button" class="btn btn-outline-success">Sign in</button></li>
          </ul>   
        </div>
      </nav>
      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active c-item">
          <img
            src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
            class="d-block w-100 c-img"
            alt="slide 1"
          />
        </div>
        <div class="carousel-item c-item">
          <img
            src="https://img.magnific.com/free-photo/beautiful-lake-mountains_395237-44.jpg?semt=ais_test_b&w=740&q=80"
            class="d-block w-100 c-img"
            alt="slide 2"
          />
        </div>
        <div class="carousel-item c-item">
          <img
            src="https://ichef.bbci.co.uk/ace/standard/3840/cpsprodpb/33b5/live/78d8d060-21ce-11f0-89a9-cb5ed9bbefd9.jpg"
            class="d-block w-100 c-img"
            alt="slide 3"
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#hero-carousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#hero-carousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
      <div class="text-box">
        <h1>Find your event...</h1>
        <h2>Find your people</h2>
        <br><br>
        <div class = "subtext">
        <p><h3>
          This is the official EventHUB of NSBM Green Uni. </p>
          <br>
          <p>Whether you're into tech, food or music, we've got it all here! </p>Search via categories or name.
        </h3></p>
        <a href="" class = "hero-btn">Browse categories</a>
        </div>
      </div>
    </section>

    <section class = "events">
     
        <div class = "events-container">
          <div class = "upcoming-events-text">
        <h2>Upcoming events</h2>
      </div>
          

        <div class = "card-container">
          <div class = "card">
            <img src ="assets/images/food.jpg">
            <div class = "card-content">
              <h3>Event title</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, expedita numquam earum quasi a qui beatae. A ipsa aperiam itaque voluptas labore sint similique possimus hic quae, est, dolore aspernatur.</p>
              <a href = "" class = "btn">Register</a>
            </div>
          </div>

          <div class = "card">
            <img src ="assets/images/food.jpg">
            <div class = "card-content">
              <h3>Event title</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, expedita numquam earum quasi a qui beatae. A ipsa aperiam itaque voluptas labore sint similique possimus hic quae, est, dolore aspernatur.</p>
              <a href = "" class = "btn">Register</a>
            </div>
          </div>

          <div class = "card">
            <img src ="assets/images/entertainment.jpg">
            <div class = "card-content">
              <h3>Event title</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, expedita numquam earum quasi a qui beatae. A ipsa aperiam itaque voluptas labore sint similique possimus hic quae, est, dolore aspernatur.</p>
              <a href = "" class = "btn">Register</a>
            </div>
          </div>
        </div>

        <div class = "events-today">
          <h2>Today's Events</h2>
          <div class = "card-container">
          <div class = "card">
            <img src ="assets/images/tech.jpg">
            <div class = "card-content">
              <h3>Event title</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, expedita numquam earum quasi a qui beatae. A ipsa aperiam itaque voluptas labore sint similique possimus hic quae, est, dolore aspernatur.</p>
              <a href = "" class = "btn">Register</a>
            </div>
          </div>

          <div class = "card">
            <img src ="assets/images/food.jpg">
            <div class = "card-content">
              <h3>Event title</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, expedita numquam earum quasi a qui beatae. A ipsa aperiam itaque voluptas labore sint similique possimus hic quae, est, dolore aspernatur.</p>
              <a href = "" class = "btn">Register</a>
            </div>
          </div>

          <div class = "card">
            <img src ="assets/images/entertainment.jpg">
            <div class = "card-content">
              <h3>Event title</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, expedita numquam earum quasi a qui beatae. A ipsa aperiam itaque voluptas labore sint similique possimus hic quae, est, dolore aspernatur.</p>
              <a href = "" class = "btn">Register</a>
              </div>
              </div>

        </div>
        </div>

        <div class = "more-events-wrapper">
          <div class = "text-center my-4">
            <button id = "showMorebtn" class = "btn btn-primary hero-btn">Show More</button>
          </div>
        </div>

        <div id = "hiddenEvents" class = "hidden-events-container">
          <div class="upcoming-events-text">
      <h2>All Scheduled Events</h2>
    </div>
    <div class="card-container">
      <div class="card">
        <img src="assets/images/tech.jpg" alt="Event">
        <div class="card-content">
          <h3>More Tech Event</h3>
          <p>Additional event details go here...</p>
          <a href="#" class="btn">Register</a>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/food.jpg" alt="Event">
        <div class="card-content">
          <h3>More Food Event</h3>
          <p>Additional event details go here...</p>
          <a href="#" class="btn">Register</a>
        </div>
      </div>
      <div class="card">
        <img src="assets/images/entertainment.jpg" alt="Event">
        <div class="card-content">
          <h3>More Music Event</h3>
          <p>Additional event details go here...</p>
          <a href="#" class="btn">Register</a>
        </div>
      </div>
    </div>
  </div>
        </div>
        </section>

        <section class = "categories">
            <h2>Browse by category</h2>
            <div class = "category-buttons">
              <button type = "button">Category 1</button>
              <button type = "button">Category 2</button>
              <button type = "button">Category 3</button>
              <button type = "button">Category 4</button>
              <button type = "button">Category 5</button>
              <button type = "button">Category 6</button>
              <button type = "button">Category 7</button>
            </div>
        </section>

        <section class = "footer">
        
          
          <img src = "assets/images/logo.png">
          <h3>NSBM Green University</h3>
          <div class = "footer-links">
            <ul>
              <li><a href = "#">Home</a></li>
                <li><a href = "#">Events</a></li>
                  <li><a href = "#">Contact</a></li>
          
            </ul>
          </div>
          <footer>
            <p>&copy; 2026 NSBM Green University</p>
          </footer>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
  </body>
</html>
