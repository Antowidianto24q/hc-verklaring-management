<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex">
  <!-- Sidebar -->
  <div class="w-64 bg-white shadow-md p-4">
    <h2 class="text-xl font-bold mb-6 text-indigo-700">Menu</h2>
    <ul class="space-y-3 text-gray-700">
      <li><a href="/dashboard" class="hover:text-indigo-600">Dashboard</a></li>
      <li><a href="/profile" class="hover:text-indigo-600">Profile</a></li>
      <?php if (session('level') === 'admin'): ?>
        <li><a href="/admin/users" class="hover:text-indigo-600">Manage Users</a></li>
      <?php endif; ?>
      <li><a href="/logout" class="text-red-500 hover:underline">Logout</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-6 overflow-y-auto">
    <?= $this->renderSection('content') ?>
  </div>
</body>
</html>
