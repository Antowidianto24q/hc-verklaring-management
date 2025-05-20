<!-- app/Views/layouts/main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Dashboard') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">
  
  <?= view('layouts/sidebar') ?>

  <div class="flex-1 flex flex-col">
    <?= view('layouts/header') ?>
    
    <main class="p-6">
      <?= $this->renderSection('content') ?>
    </main>

    <?= view('layouts/footer') ?>
  </div>
</body>
</html>
