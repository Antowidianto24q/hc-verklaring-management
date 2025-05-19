<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-700">Admin Dashboard</h1>
    <p class="mt-2 text-gray-600">Welcome, <?= session('username') ?> (Admin)</p>
    <a href="/logout" class="text-indigo-600 hover:underline mt-4 inline-block">Logout</a>
  </div>
</body>
</html>
