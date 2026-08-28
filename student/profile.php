<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/navbar.php'; ?>
<link rel="stylesheet" href="../assets/css/student.css">

<style>
    .tab-content{
        display:none;
        padding-top:2rem;
        padding-bottom:2rem;
        min-height:450px;
    }
    .tab-content.active{
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .tab-btn.active{
        font-weight:bold;
        border-bottom:2px solid #39B54A;
        color: #39B54A;
    }
</style>

<div class = "profile-container">
<div class="avatar">
  <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring-2 ring-offset-2">
    <img alt="Tailwind-CSS-Avatar-component" src="https://img.daisyui.com/images/profile/demo/spiderperson@192.webp" />
  </div>
</div>
<div class = "profile-info">
<div class = "profile-name">
    <h3>John Doe</h3>
</div>
<div class = "joined-date">
    <h6>Joined January 2026</h6>
</div>
<div class = "st-email">
    <h6>johndoe@nsbm.ac.lk</h6>
</div>
<div class = "faculty">
    <h6>FOC</h6>
</div>
</div>
</div>

<div class = "profile-events">
    <ul>
        <li><button class = "tab-btn active" data-tab = "registered">Registered events</button></li>
        <li><button class = "tab-btn" data-tab="attended">Attended events</button></li>
        <li><button class = "tab-btn" data-tab = "following">Following</button></li>
    </ul>
</div>

<div id = "registered" class = "tab-content active">
    <div class="card bg-base-100 w-96 shadow-sm">
  <figure>
    <img
      src=""
      alt="Shoes" />
  </figure>
  <div class="card-body">
    <h2 class="card-title">Card Title</h2>
    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
    <div class="card-actions justify-end">
      <button class="btn btn-primary">Buy Now</button>
    </div>
  </div>
</div>
</div>

<div id="attended" class="tab-content hidden">
  <div class="card bg-base-100 w-96 shadow-sm">
    <figure>
      <img src="" alt="Attended Event" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">Attended Event</h2>
      <p>Details for past events you attended.</p>
      <div class="card-actions justify-end">
        <button class="btn btn-secondary">Certificate</button>
      </div>
    </div>
  </div>
</div>

<div id="following" class="tab-content hidden">
  <div class="card bg-base-100 w-96 shadow-sm">
    <div class="card-body">
      <h2 class="card-title">IEEE</h2>
      <p>Community updates and followed clubs.</p>
      <div class="card-actions justify-end">
        <button class="btn btn-outline">Unfollow</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const targetTab = button.getAttribute('data-tab');

        
        buttons.forEach(btn => btn.classList.remove('active'));

        contents.forEach(content => content.classList.remove('active'));

        button.classList.add('active');

        const activeContent = document.getElementById(targetTab);
        if (activeContent) {
          activeContent.classList.add('active');
        }
      });
    });
  });
</script>
<?php include __DIR__ . '/../includes/footer.php'; ?>