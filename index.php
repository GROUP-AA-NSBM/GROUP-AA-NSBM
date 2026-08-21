<?php require_once './includes/db.php'; ?>
<?php include './includes/header.php'; ?>
<?php include './includes/not-loggedin-navbar.php'; ?>


<div
  class="hero min-h-screen"
  style="background-image: url(https://d3c539pel8wzjz.cloudfront.net/wp-content/uploads/2025/12/vice-chancellor-nsbm-1024x683.jpg);"
>
  <div class="hero-overlay"></div>
  <div class="hero-content text-neutral-content text-center">
    <div class="max-w-md">
      <h1 class="mb-5 text-5xl font-bold">Welcome to the NSBM Event Hub</h1>
      <p class="mb-5">
        A centralised platform where NSBM students can discover,
        explore, and register for upcoming university events. 
      </p>
      <button class="btn btn">Discover Events</button>
    </div>
  </div>
</div>


<section class="events-today">
  <div class="p-text text-left mb-6">
    <h2 class="text-2xl font-bold">Upcoming Events</h2>
  </div>

  <div class="cards flex flex-row flex-wrap justify-center gap-8">
    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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

    <div class="card bg-base-100 shadow-sm">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
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
    <h2 class="text-2xl font-bold">Explore by Category</h2>
  </div>
  <div class="button-container flex flex-wrap justify-center gap-4 mb-8">
    <button class="category-btn btn btn-primary active" data-category="all">All</button>
    <button class="category-btn btn btn-soft btn-primary" data-category="tech">Tech</button>
    <button class="category-btn btn btn-soft btn-primary" data-category="marketing">Marketing</button>
    <button class="category-btn btn btn-soft btn-primary" data-category="food-and-drink">Food and drink</button>
    <button class="category-btn btn btn-soft btn-primary" data-category="arts-and-culture">Arts and culture</button>
  </div>

  <div class="cards category-cards flex flex-row flex-wrap justify-center gap-8">
    <!-- Line 1 -->
    <div class="card bg-base-100 shadow-sm" data-category="tech">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Tech Event" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">AI & Hackathon 2026</h2>
        <p>Explore cutting-edge artificial intelligence and showcase your building skills.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 shadow-sm" data-category="marketing">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Marketing Event" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Digital Brand Strategy</h2>
        <p>Master modern brand growth techniques with industry leaders.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 shadow-sm" data-category="food-and-drink">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Food Event" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Campus Food Carnival</h2>
        <p>Enjoy diverse culinary treats and refreshments prepared by student chefs.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 shadow-sm" data-category="arts-and-culture">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Arts Event" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Annual Cultural Night</h2>
        <p>Celebrate music, dance, and creative performances from across faculties.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <!-- Line 2 -->
    <div class="card bg-base-100 shadow-sm" data-category="tech">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Tech Event 2" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Web Dev Bootcamp</h2>
        <p>Hands-on workshop for building full-stack web apps using modern frameworks.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 shadow-sm" data-category="marketing">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Marketing Event 2" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Social Media Workshop</h2>
        <p>Learn viral content creation tactics and social growth automation.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 shadow-sm" data-category="food-and-drink">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Food Event 2" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Barista & Coffee Fest</h2>
        <p>Experience artisanal coffee brewing sessions and tasting competitions.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <div class="card bg-base-100 shadow-sm" data-category="arts-and-culture">
      <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Arts Event 2" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Fine Arts Exhibition</h2>
        <p>Discover student paintings, sculptures, and digital art galleries.</p>
        <div class="card-actions justify-end">
          <a href="student/register-event.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const categoryButtons = document.querySelectorAll('.category-btn');
  const categoryCards = document.querySelectorAll('.category-cards .card');

  categoryButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      // Update button styling
      categoryButtons.forEach(b => {
        b.classList.remove('active');
        b.classList.add('btn-soft');
      });
      this.classList.remove('btn-soft');
      this.classList.add('active');

      // Filter cards
      const selected = this.getAttribute('data-category');
      categoryCards.forEach(card => {
        const cardCat = card.getAttribute('data-category');
        if (selected === 'all' || cardCat === selected) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
</script>



<?php include './includes/footer.php'; ?>
