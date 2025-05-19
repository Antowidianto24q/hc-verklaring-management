<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold">Admin Dashboard</h1>
<p>Welcome, <?= session('username') ?> </p>

<?= $this->endSection() ?>
