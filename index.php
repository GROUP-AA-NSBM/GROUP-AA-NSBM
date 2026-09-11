<?php 
require_once __DIR__ . '/includes/db.php'; 
require_once __DIR__ . '/includes/auth.php'; 
include __DIR__ . '/includes/header.php'; 

if (isset($_SESSION['user_id'])) {
    include __DIR__ . '/includes/navbar.php';
} else {
    include __DIR__ . '/includes/not-loggedin-navbar.php';
}

$events = $pdo->query("SELECT * FROM events ORDER BY start_time ASC")->fetchAll();
$communities = $pdo->query("SELECT * FROM communities ORDER BY name ASC")->fetchAll();
?>


<div class="hero min-h-screen relative overflow-hidden">
  <div id="hero-slider-track" class="absolute inset-0 flex w-[600%] h-full transition-transform duration-700 ease-in-out z-0">
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover1.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover2.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover3.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover4.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover5.jpg');"></div>
    <div class="w-1/6 h-full bg-cover bg-center" style="background-image: url('assets/images/cover6.jpg');"></div>
  </div>

  <div class="hero-overlay bg-black/50 absolute inset-0 z-10"></div>

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
    <?php foreach ($events as $event): ?>
      <div class="card bg-base-100 border border-gray-200" style="width: 320px;">
        <figure style="height: 180px; overflow: hidden; background: #eee;">
          <img
            src="<?php echo $event['banner_image_url']; ?>"
            alt="<?php echo htmlspecialchars($event['title']); ?>" 
            style="width: 100%; height: 100%; object-fit: cover;" />
        </figure>
        <div class="card-body">
          <h2 class="card-title text-lg text-black"><b><?php echo htmlspecialchars($event['title']); ?></b></h2>
          <p class="text-sm text-gray-900 line-clamp-2"><?php echo htmlspecialchars($event['description']); ?></p>
          <p class="text-xs font-medium mt-2" style="color: #19589D;">
            <?php echo htmlspecialchars($event['venue']); ?> | <?php echo date('M d, Y', strtotime($event['start_time'])); ?>
          </p>
          <?php if (isLoggedIn()): ?>
            <div class="card-actions justify-end mt-4">
              <a href="student/event.php?id=<?php echo $event['event_id']; ?>" class="btn btn-primary btn-sm" style="height: 33px; min-height: 33px; padding: 5px 17px; font-size: 13px;">Register</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</section>


<section class="categories" id="communities">
  <div class="p-text text-left mb-6">
    <h2 class="text-2xl font-bold" style="color: #19589D;">Explore Communities</h2>
  </div>

  <div class="cards flex flex-row flex-wrap justify-center gap-8">
    <?php foreach ($communities as $community): ?>
      <div class="card bg-base-100 border border-gray-200 block text-current" style="min-width: 220px;">
        <div class="card-body" style="padding: 24px;">
          <center><h2 class="card-title text-base"><b><?php echo htmlspecialchars($community['name']); ?></b></h2></center>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const sliderTrack = document.getElementById('hero-slider-track');
  const totalSlides = 6;

  if (sliderTrack) {
    let currentSlide = 0;
    setInterval(() => {
      currentSlide = (currentSlide + 1) % totalSlides;
      sliderTrack.style.transform = `translateX(-${(currentSlide * 100) / totalSlides}%)`;
    }, 4000);
  }

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

<?php include __DIR__ . '/includes/footer.php'; ?>