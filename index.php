<?php 
require_once __DIR__ . '/includes/db.php'; 
require_once __DIR__ . '/includes/auth.php'; 
include __DIR__ . '/includes/header.php'; 

if (isset($_SESSION['user_id'])) {
    include __DIR__ . '/includes/navbar.php';
} else {
    include __DIR__ . '/includes/not-loggedin-navbar.php';
}

$events = $pdo->query("
    SELECT e.*, c.name AS category_name 
    FROM events e 
    LEFT JOIN event_categories ec ON e.event_id = ec.event_id 
    LEFT JOIN categories c ON ec.category_id = c.category_id 
    WHERE e.status = 'published' 
    ORDER BY e.start_time ASC
")->fetchAll();

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
    <?php if (empty($events)): ?>
      <p class="text-gray-500 py-8">No upcoming events scheduled right now. Check back soon!</p>
    <?php else: ?>
      <?php foreach ($events as $ev): ?>
        <div class="card bg-base-100 border border-gray-200" style="width: 320px;">
          <figure style="height: 180px; overflow: hidden; background: #eee;">
            <img
              src="<?php echo htmlspecialchars(!empty($ev['banner_image_url']) ? $ev['banner_image_url'] : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800'); ?>"
              alt="<?php echo htmlspecialchars($ev['title']); ?>" 
              style="width: 100%; height: 100%; object-fit: cover;" />
          </figure>
          <div class="card-body">
            <span class="text-xs font-semibold text-primary"><?php echo htmlspecialchars($ev['category_name'] ?? 'Event'); ?></span>
            <h2 class="card-title text-lg"><?php echo htmlspecialchars($ev['title']); ?></h2>
            <p class="text-sm text-gray-600 line-clamp-2"><?php echo htmlspecialchars($ev['description'] ?? ''); ?></p>
            <p class="text-xs text-gray-500 mt-2">
              📍 <?php echo htmlspecialchars($ev['venue']); ?> &bull; 🗓️ <?php echo date('M d, Y', strtotime($ev['start_time'])); ?>
            </p>
            <div class="card-actions justify-end mt-4">
              <a href="student/event.php?id=<?php echo $ev['event_id']; ?>" class="btn btn-primary btn-sm">Register</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

</section>


<section class="categories">
  <div class="p-text text-left mb-6">
    <h2 class="text-2xl font-bold">Explore Communities</h2>
  </div>

  <div class="cards flex flex-row flex-wrap justify-center gap-8">
    <?php if (empty($communities)): ?>
      <p class="text-gray-500">No communities found.</p>
    <?php else: ?>
      <?php foreach ($communities as $com): ?>
        <div class="card bg-base-100 border border-gray-200 block text-current" style="min-width: 220px;">
          <div class="card-body text-center flex items-center justify-center p-6">
            <h2 class="card-title text-center m-0 text-base"><?php echo htmlspecialchars($com['name']); ?></h2>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
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



<?php include './includes/footer.php'; ?>
