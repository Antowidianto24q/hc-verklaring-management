 
<!-- app/Views/layouts/header.php -->
<header class="bg-white p-4 shadow flex justify-between">
  <h1 class="text-lg font-bold"><?= esc($title ?? '') ?></h1>

  <?php if (isset($profile)): ?>
    <div class="text-sm text-gray-700">
        Selamat Datang <strong><?= esc($profile['username']) ?></strong>&nbsp;(<?= esc($profile['outlet_name']) ?>)
    </div>
<?php endif; ?>



</header>
