<!-- app/Views/layouts/header.php -->
<header class="bg-white p-4 shadow flex justify-between">
  <h1 class="text-lg font-bold"><?= esc($title ?? '') ?></h1>
  <span>Welcome, <?= esc(session()->get('username')) ?></span>
</header>
