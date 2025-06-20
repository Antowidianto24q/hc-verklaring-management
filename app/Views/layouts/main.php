<!-- app/Views/layouts/main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Dashboard') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">
  
  <?= view('layouts/sidebar') ?>

  <div class="flex-1 flex flex-col">
    <?= view('layouts/header') ?>
    
    <main class="p-6">
      <?= $this->renderSection('content') ?>
    </main>

    <?= view('layouts/footer') ?>
  </div>
</body>
<script src="//unpkg.com/alpinejs" defer></script>

<script>
    // Mobile sidebar state management
    document.addEventListener('alpine:init', () => {
      Alpine.data('sidebar', () => ({
        isMobileSidebarOpen: false
      }));
    });

    // Profile menu toggle function
    function toggleProfileMenu() {
      const menu = document.getElementById('profileMenu');
      menu.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      const menu = document.getElementById('profileMenu');
      const button = e.target.closest('button');
      if (!e.target.closest('#profileMenu') && (!button || !button.onclick?.toString().includes('toggleProfileMenu'))) {
        menu.classList.add('hidden');
      }
    });
  </script>

</html>
