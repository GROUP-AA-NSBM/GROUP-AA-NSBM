<div class="navbar bg-base-100" style="position: relative; z-index: 1000; border-bottom: 1px solid #e5e7eb;">
  <div class="flex-1">
    <a href="/GROUP-AA-NSBM/index.php" class="text-xl font-bold text-base-content px-4 py-2">NSBM Event Hub</a>
  </div>

  <div class="flex-none flex items-center gap-2" style="padding-right: 16px;">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <a href="/GROUP-AA-NSBM/auth/logout.php" class="btn btn-ghost btn-sm text-error" style="height: 29px; min-height: 29px; padding: 3px 12px; font-size: 13px;">Logout</a>
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
