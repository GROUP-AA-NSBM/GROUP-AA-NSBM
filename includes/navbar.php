<div class="navbar bg-base-100 shadow-sm" style="position: relative; z-index: 1000;">
  <div class="flex-1">
    <a href="/GROUP-AA-NSBM/index.php" class="text-xl font-bold text-base-content px-4 py-2">NSBM Event Hub</a>
  </div>

  <div class="flex-none flex items-center gap-2" style="padding-right: 16px;">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <a href="/GROUP-AA-NSBM/admin/dashboard.php" class="btn btn-outline btn-primary btn-sm">Admin Dashboard</a>
      <a href="/GROUP-AA-NSBM/auth/logout.php" class="btn btn-ghost btn-sm text-error">Logout</a>
    <?php else: ?>
      <a href="/GROUP-AA-NSBM/student/profile.php" class="btn btn-ghost btn-circle avatar" title="Profile">
        <div class="w-10 rounded-full">
          <img
            alt="user avatar"
            src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png"/>
        </div>
      </a>
    <?php endif; ?>
  </div>
</div>
