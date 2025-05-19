<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<h1 class="text-xl font-bold mb-4">Edit User</h1>

<form method="post" action="<?= base_url('/admin/users/update/' . $user['id']) ?>" class="space-y-4 max-w-md">
    <div>
        <label>Username</label>
        <input type="text" name="username" value="<?= esc($user['username']) ?>" required class="w-full border px-3 py-2 rounded">
    </div>
    <div>
        <label>New Password (optional)</label>
        <input type="password" name="password" class="w-full border px-3 py-2 rounded">
    </div>
    <div>
        <label>Role</label>
        <select name="level" class="w-full border px-3 py-2 rounded">
            <option value="admin" <?= $user['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= $user['level'] == 'user' ? 'selected' : '' ?>>User</option>
        </select>
    </div>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
</form>

<?= $this->endSection() ?>
