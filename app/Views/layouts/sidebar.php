<!-- app/Views/layouts/sidebar.php -->
<aside class="w-64 bg-white shadow-md hidden md:block">
  <div class="p-4 text-xl font-bold">On Develop</div>
  <nav class="p-4 space-y-2">
    <a href="<?= base_url('/dashboard') ?>" class="block text-gray-700 hover:text-indigo-600">Dashboard</a>
    <a href="<?= base_url('/profile') ?>" class="block text-gray-700 hover:text-indigo-600">Profile</a>
    <?php if (session('level') === 'admin'): ?>
    <a href="<?= base_url('/admin/users') ?>" class="block text-gray-700 hover:text-indigo-600">Manage User</a>
    <?php endif; ?>
    <a href="<?= base_url('/logout') ?>" class="block text-red-600">Logout</a>
  </nav>
</aside>

