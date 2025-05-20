<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">My Profile</h1>

<?php if (session()->getFlashdata('error')): ?>
  <div class="text-red-500 mb-4"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')): ?>
  <div class="text-green-500 mb-4"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= base_url('/profile/change-password') ?>" method="post" class="space-y-4 max-w-md">
  <?= csrf_field() ?>
  <div>
    <label class="block mb-1">Old Password</label>
    <input type="password" name="old_password" required class="w-full px-3 py-2 border rounded" />
  </div>
  <div>
    <label class="block mb-1">New Password</label>
    <input type="password" name="new_password" required class="w-full px-3 py-2 border rounded" />
  </div>
  <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Update Password</button>
</form>

<?= $this->endSection() ?>
