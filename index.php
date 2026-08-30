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
    <a href="student/community.php?name=IEEE+Student+Branch" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">IEEE Student Branch</h2>
        <p>Fostering technological innovation and engineering excellence among students.</p>
      </div>
    </a>

    <a href="student/community.php?name=Rotaract+Club" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Rotaract Club</h2>
        <p>Empowering youth through community leadership, service, and professional development.</p>
      </div>
    </a>

    <a href="student/community.php?name=Marketing+Circle" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Marketing Circle</h2>
        <p>Connecting creative minds to explore digital brand growth, strategy, and media.</p>
      </div>
    </a>

    <a href="student/community.php?name=Software+Engineering+Society" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Software Engineering Society</h2>
        <p>A community dedicated to coding, open-source projects, and technical workshops.</p>
      </div>
    </a>

    <a href="student/community.php?name=Arts+%26+Culture+Club" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Arts & Culture Club</h2>
        <p>Bringing together student talent in music, drama, fine arts, and stage performances.</p>
      </div>
    </a>

    <a href="student/community.php?name=Sports+Council" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Sports Council</h2>
        <p>Organizing intra-university tournaments, athletics, and fitness initiatives.</p>
      </div>
    </a>

    <a href="student/community.php?name=Buddhist+Society" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Buddhist Society</h2>
        <p>Promoting mindfulness, ethics, and spiritual development across campus.</p>
      </div>
    </a>

    <a href="student/community.php?name=Gaming+%26+Esports+Society" class="card bg-base-100 border border-gray-200 block text-current no-underline">
      <div class="card-body">
        <h2 class="card-title">Gaming & Esports Society</h2>
        <p>Competitive gaming tournaments, game dev meetups, and esports events.</p>
      </div>
    </a>
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
