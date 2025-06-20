
  <!-- Mobile header -->
  <header class="bg-white p-4 shadow flex justify-between items-center sticky top-0 z-20">
    <!-- Mobile menu button -->
    <button @click="isMobileSidebarOpen = true" class="md:hidden mr-2">
      <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <h1 class="text-lg font-bold flex-grow truncate"><?= esc($title ?? '') ?></h1>

    <div class="relative">
      <button onclick="toggleProfileMenu()" class="flex items-center space-x-2 focus:outline-none">
        <div class="w-8 h-8 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center font-semibold text-sm">
          <?= substr(esc($profile['username'] ?? 'U'), 0, 1) ?>
        </div>
        <span class="text-sm text-gray-700 font-medium hidden sm:inline"><?= esc($profile['username'] ?? 'User') ?></span>
        <svg class="w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0-6v2m6.36 1.64l-1.41 1.41M22 12h-2m-1.64 6.36l-1.41-1.41M12 22v-2m-6.36-1.64l1.41-1.41M2 12h2m1.64-6.36l1.41 1.41"/>
        </svg>
      </button>

      <div id="profileMenu" class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg hidden z-50">
        <a href="<?= base_url('/profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
        <a href="<?= base_url('/logout') ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
      </div>
    </div>
  </header>