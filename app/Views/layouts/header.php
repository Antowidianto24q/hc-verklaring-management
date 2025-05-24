<!-- app/Views/layouts/header.php -->
<header class="bg-white p-4 shadow flex justify-between items-center">
  <h1 class="text-lg font-bold"><?= esc($title ?? '') ?></h1>

  <div class="relative">
    <button onclick="toggleProfileMenu()" class="flex items-center space-x-2 focus:outline-none">
      <img src="https://ui-avatars.com/api/?name=<?= urlencode($profile['username'] ?? 'User') ?>&background=random" alt="Avatar" class="w-8 h-8 rounded-full">
      <span class="text-sm text-gray-700 font-medium hidden sm:inline"><?= esc($profile['username'] ?? 'User') ?></span>
      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>

    <div id="profileMenu" class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg hidden z-50">
      <a href="<?= base_url('/profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
      <a href="<?= base_url('/logout') ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
    </div>
  </div>
</header>
