<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1 class="text-xl font-bold mb-4">Create User</h1>

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

<?= $this->endSection() ?>
