<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold">User Dashboard</h1>
<p>Welcome, <?= session('username') ?> </p>

<?= $this->endSection() ?>
