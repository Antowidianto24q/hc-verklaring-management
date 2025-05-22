<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">👤 My Profile</h1>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <!-- Profile Info Card -->
  <div class="grid md:grid-cols-2 gap-6 mb-6">
    <div class="space-y-2">
      <p><span class="font-semibold">🆔 Username:</span> <?= esc($user['username']) ?></p>
      <p><span class="font-semibold">🏪 Outlet Name:</span> <?= esc($user['outlet_name']) ?></p>
      <p><span class="font-semibold">📍 Address:</span> <?= esc($user['address']) ?></p>
    </div>
    <div class="space-y-2">
      <p><span class="font-semibold">📧 Email:</span> <?= esc($user['email']) ?></p>
      <p><span class="font-semibold">📞 Phone:</span> <?= esc($user['phone']) ?></p> 
    </div>
  </div>

    <!-- Trigger Button -->
    <button onclick="document.getElementById('passwordModal').classList.remove('hidden')" 
          class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 justify-beetwen">
    🔒 Change Password
  </button>
</div>

<!-- Modal -->
<div id="passwordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
    <button onclick="document.getElementById('passwordModal').classList.add('hidden')" 
            class="absolute top-2 right-5 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

    <h2 class="text-xl font-semibold mb-4">Change Password</h2>

    <form action="<?= base_url('/profile/change-password') ?>" method="post" class="space-y-4">
      <?= csrf_field() ?>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Old Password</label>
        <input type="password" name="old_password" required class="w-full px-3 py-2 border rounded-lg" />
      </div>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">New Password</label>
        <input type="password" name="new_password" required class="w-full px-3 py-2 border rounded-lg" />
      </div>
      <div class="flex justify-end">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
