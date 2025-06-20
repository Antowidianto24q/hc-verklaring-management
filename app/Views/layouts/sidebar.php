<aside 
  x-data="{ openVerklaring: <?= url_is('/verklaringen*') || url_is('/verklaringExcel') || url_is('/verklaringMailing') ? 'true' : 'false' ?> }"
  :class="{
    'translate-x-0': isMobileSidebarOpen,
    '-translate-x-full': !isMobileSidebarOpen,
    'w-64': !isSidebarCollapsed,
    'w-16': isSidebarCollapsed
  }"
  class=" display:block;fixed inset-y-0 left-0 z-40 bg-gray-800 text-white shadow-md transition-all duration-300 ease-in-out transform md:translate-x-0 md:static"
>

<nav class="p-2 space-y-1"> 
    <div class="flex items-center justify-between p-4"> 
      <img src="<?= base_url('assets/images/nabati_logo.png') ?>" alt="Logo" 
          x-show="!isSidebarCollapsed" x-cloak class="h-8 w-auto">
 
      <img src="<?= base_url('assets/images/nabati_logo.png') ?>" alt="Logo" 
          x-show="isSidebarCollapsed" x-cloak class="h-8 w-auto">
    </div>
 
    <!-- Dashboard --> 
    <button @click="isMobileSidebarOpen = false; window.location.href = '<?= base_url('/dashboard') ?>'"
    class="flex items-center gap-3 px-3 py-2 hover:bg-gray-700 rounded-md transition-all w-full <?= (url_is('/dashboard')) ? 'bg-gray-700 ' : '' ?>">
      <!-- Icon: Home -->
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9v8a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
      </svg>
      <span x-show="!isSidebarCollapsed">Dashboard</span>
    </button>

    <!-- Dropdown: Verklaring -->
    <div class="relative">
      <button @click="openVerklaring = !openVerklaring"
        class="flex items-center justify-between w-full px-3 py-2 hover:bg-gray-700 rounded-md transition-all
          <?= (url_is('/verklaringen*') || url_is('/verklaringExcel') || url_is('/verklaringMailing')) ? 'bg-gray-700' : '' ?>">
        <div class="flex items-center gap-3">
          <!-- Icon: File Text -->
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 4h16v16H4z M8 10h8M8 14h6"/>
          </svg>
          <span x-show="!isSidebarCollapsed">Verklaring</span>
        </div>
        <svg x-show="!isSidebarCollapsed" :class="{ 'rotate-180': openVerklaring }"
          class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"/>
        </svg>
      </button>

      <!-- Submenu -->
      <div x-show="openVerklaring && !isSidebarCollapsed" x-transition @click.outside="openVerklaring = false"
        class="pl-10 mt-1 space-y-2 border-l border-gray-700">
        <a href="<?= base_url('/verklaringExcel') ?>" class="block text-sm text-blue hover:text-indigo-300 <?= url_is('/verklaringExcel') ? 'text-indigo-300 font-bold ' : '' ?>">
          Upload Excel
        </a>
        <a href="<?= base_url('/verklaringMailing') ?>" class="block text-sm text-blue hover:text-indigo-300 <?= url_is('/verklaringMailing') ? 'text-indigo-300 font-bold' : '' ?>">
          Mailing
        </a>
      </div>
    </div>

    <!-- Admin only -->
    <?php if (session('level') === 'admin'): ?>
    <a href="<?= base_url('/admin/users') ?>" @click="isMobileSidebarOpen = false"
      class="flex items-center gap-3 px-3 py-2 hover:bg-gray-700 rounded-md transition-all <?= (url_is('/admin/users')) ? 'bg-gray-700' : '' ?>">
      <!-- Icon: Users -->
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2M9 7a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
      </svg>
      <span x-show="!isSidebarCollapsed">Manage User</span>
    </a>
    <?php endif; ?>
  </nav>
</aside>
