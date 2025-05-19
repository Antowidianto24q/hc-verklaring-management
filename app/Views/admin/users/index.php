<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-bold">User Management</h1>
    <a href="<?= base_url('/admin/users/create') ?>" class="px-4 py-2 bg-green-600 text-white rounded">Add User</a>
</div>

<?php if(session()->getFlashdata('success')): ?>
<div class="p-2 bg-green-200 text-green-800 mb-4"><?= session('success') ?></div>
<?php endif; ?>

<table class="min-w-full bg-white shadow-md rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4">Username</th>
            <th class="py-2 px-4">Level</th>
            <th class="py-2 px-4">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr class="border-t">
            <td class="py-2 px-4"><?= esc($user['username']) ?></td>
            <td class="py-2 px-4"><?= esc($user['level']) ?></td>
            <td class="py-2 px-4 space-x-2">
                <a href="<?= base_url('/admin/users/edit/' . $user['id']) ?>" class="text-blue-600">Edit</a>
                <a href="<?= base_url('/admin/users/delete/' . $user['id']) ?>" class="text-red-600" onclick="return confirm('Delete user?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
