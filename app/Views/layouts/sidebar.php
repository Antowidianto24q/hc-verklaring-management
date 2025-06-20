<aside 
      x-data="{ openDropdown: '' }"
      :class="{ 'translate-x-0': isMobileSidebarOpen }"
      class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-200 shadow-md transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:static"
    >
      <div class="p-4 text-xl font-bold">On Develop</div>
      <nav class="p-4 space-y-2">
        <a href="<?= base_url('/dashboard') ?>" @click="isMobileSidebarOpen = false" class="flex items-center text-gray-700 hover:text-indigo-600 <?= (url_is('/dashboard')) ? 'text-indigo-600 font-medium' : 'text-gray-700 hover:text-indigo-600' ?>">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          Dashboard
        </a>
        
        <div x-data="{ open: false }" class="relative">
          <button @click="open = !open" class="flex items-center justify-between w-full <?= (url_is('/verklaringen*')) ? 'text-indigo-600 font-medium' : 'text-gray-700 hover:text-indigo-600' ?>">
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg>
              Verklaring
            </div>
            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
           
          <div x-show="open" @click.outside="open = false" class="pl-8 mt-1 space-y-2 border-l-2 border-gray-100">
            <a href="<?= base_url('/verklaringExcel') ?>" @click="isMobileSidebarOpen = false" class="block <?= (url_is('/verklaringExcel')) ? 'text-sm text-indigo-600 font-medium' : 'text-sm text-gray-700 hover:text-indigo-600' ?>"> Upload Excel </a>
            <a href="<?= base_url('/verklaringMailing') ?>" @click="isMobileSidebarOpen = false" class="block <?= (url_is('/verklaringMailing')) ? 'text-sm text-indigo-600 font-medium' : 'text-sm text-gray-700 hover:text-indigo-600' ?>">Mailing</a>
          </div>
        </div>

        <?php if (session('level') === 'admin'): ?>
        <a href="<?= base_url('/admin/users') ?>" @click="isMobileSidebarOpen = false" class="flex items-center <?= (url_is('/admin/users')) ? 'text-indigo-600 font-medium' : 'text-gray-700 hover:text-indigo-600' ?>">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
          Manage User
        </a>
        <?php endif; ?>
      </nav>
    </aside>
<script src="//unpkg.com/alpinejs" defer></script>