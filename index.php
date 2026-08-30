<?php require_once './includes/db.php'; ?>
<?php include './includes/header.php'; ?>
<?php include './includes/not-loggedin-navbar.php'; ?>


<div class="hero min-h-screen relative overflow-hidden">
  <!-- Sliding Background Track -->
  <div id="hero-slider-track" class="absolute inset-0 flex w-[600%] h-full transition-transform duration-700 ease-in-out z-0">
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover1.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover2.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover3.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover4.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover5.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover6.jpg');"></div>
  </div>

  <!-- Hero Overlay -->
  <div class="hero-overlay bg-black/50 absolute inset-0 z-10"></div>

  <!-- Hero Content -->
  <div class="hero-content text-neutral-content text-center relative z-20">
    <div class="max-w-md">
      <h1 class="mb-5 text-5xl font-bold text-white">Welcome to the NSBM Event Hub</h1>
      <p class="mb-5 text-white/90">
        A centralised platform where NSBM students can discover,
        explore, and register for upcoming university events. 
      </p>
      <a href="#upcoming-events" id="discover-btn" class="btn btn-primary">Discover Events</a>
    </div>
  </div>
</div>


<section class="events-today" id="upcoming-events">
  <div class="p-text text-left mb-6">
    <h2 class="text-2xl font-bold">Upcoming Events</h2>
  </div>

  <div class="cards flex flex-row flex-wrap justify-center gap-8">
    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200">
      <figure>
        <img
          src=""
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>
  </div>

  
  




</section>













<section class="categories">
  <div class="p-text text-left mb-6">
    <h2 class="text-2xl font-bold">Explore Communities</h2>
  </div>

  <div class="cards flex flex-row flex-wrap justify-center gap-8">
    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">IEEE Student Branch</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Rotaract Club</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Marketing Circle</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Software Engineering Society</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Arts & Culture Club</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Sports Council</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Buddhist Society</h2>
      </div>
    </div>

    <div class="card bg-base-100 border border-gray-200 block text-current">
      <div class="card-body text-center flex items-center justify-center p-6">
        <h2 class="card-title text-center m-0">Gaming & Esports Society</h2>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Hero Image Sliding Effect
  const sliderTrack = document.getElementById('hero-slider-track');
  const totalSlides = 6;

  if (sliderTrack) {
    let currentSlide = 0;
    setInterval(() => {
      currentSlide = (currentSlide + 1) % totalSlides;
      sliderTrack.style.transform = `translateX(-${(currentSlide * 100) / totalSlides}%)`;
    }, 4000);
  }

  // Smooth Scroll for Discover Events Button
  const discoverBtn = document.getElementById('discover-btn');
  const upcomingSection = document.getElementById('upcoming-events');

  if (discoverBtn && upcomingSection) {
    discoverBtn.addEventListener('click', function(e) {
      e.preventDefault();
      upcomingSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  }
});
</script>



<?php include './includes/footer.php'; ?>
