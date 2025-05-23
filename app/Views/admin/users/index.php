<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex justify-end items-center mb-6">
    <!-- <h1 class="text-2xl font-semibold text-gray-800">User Management</h1> -->
        <!-- Trigger Button -->
        <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="inline-flex items-center ml-4 gap-2 px-4 py-2 bg-gray-400 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-500 transition">
    ➕ Add User
  </button>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow-sm">
        <?= session('success') ?>
    </div>
<?php endif; ?>

<div class="overflow-x-auto bg-white rounded-xl shadow-lg ring-1 ring-gray-200">
    <table class="min-w-full text-sm text-gray-700">
        <thead class="bg-gray-50 text-xs uppercase text-gray-500 border-b">
            <tr>
                <th class="px-6 py-3 text-left">Username</th>
                <th class="px-6 py-3 text-left">Level</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr class="hover:bg-gray-50 border-b">
                    <td class="px-6 py-4 font-medium text-gray-900"><?= esc($user['username']) ?></td>
                    <td class="px-6 py-4"><?= esc($user['level']) ?></td>
                    <td class="px-6 py-4">
                    <button 
                        onclick="openEditModal(this)"
                        data-id="<?= $user['id'] ?>"
                        data-username="<?= $user['username'] ?>"
                        data-level="<?= $user['level'] ?>"
                        class="inline-flex items-center px-3 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-xs font-medium"
                        title="Edit"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1-1v2m-1 11h2m-1 1v-2m4-6h2m-1-1v2m-8 0h2m-1-1v2m-1 2h2m-1-1v2" />
                        </svg>
                        Edit
                    </button>
                            <a href="<?= base_url('/admin/users/delete/' . $user['id']) ?>"
                               onclick="return confirm('Delete user?')"
                               class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition text-xs font-medium"
                               title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

 
<!-- Modal -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
    <button onclick="document.getElementById('addModal').classList.add('hidden')" 
            class="absolute top-2 right-5 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

    <h2 class="text-xl font-semibold mb-4">Add User</h2>

    <form method="post" action="<?= base_url('/admin/users/store') ?>" class="space-y-4 max-w-md">
    <div>
        <label>Username</label>
        <input type="text" name="username" required class="w-full border px-3 py-2 rounded">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
    </div>
    <div>
        <label>Role</label>
        <select name="level" class="w-full border px-3 py-2 rounded">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Create</button>
</form>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded shadow-lg p-6 w-full max-w-md relative">
        <button onclick="closeEditModal()" class="absolute top-2 right-5 text-gray-500 hover:text-gray-700">
            &times;
        </button>
        <h2 class="text-lg font-bold mb-4">Edit User</h2>
        <form id="editForm" action="<?= base_url('/admin/users/update/' . $user['id']) ?>" method="post" class="space-y-4">
            <input type="hidden" name="id" id="edit-id">
            <div>
                <label class="block mb-1">Username</label>
                <input type="text" name="username" id="edit-username" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block mb-1">Level</label>
                <select name="level" id="edit-level" class="w-full border px-3 py-2 rounded">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
        </form>
    </div>
</div>


<script>
    function openEditModal(button) {
        const id = button.getAttribute('data-id');
        const username = button.getAttribute('data-username');
        const level = button.getAttribute('data-level');

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-username').value = username;
        document.getElementById('edit-level').value = level;

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

<?= $this->endSection() ?>
