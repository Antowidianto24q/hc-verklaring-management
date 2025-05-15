<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - HC Uniform Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-sm p-10 space-y-9 bg-white rounded-xl shadow-lg">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800">Login</h1>
            <p class="text-sm text-gray-500">HC Uniform Management System</p>
        </div>

       

        <form method="post" action="<?= base_url('login') ?>" class="space-y-4">
            <?= csrf_field() ?>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Sign In
            </button>
        </form>

        <p class="text-xs text-center text-gray-400">© <?= date('Y') ?> Richeese Factory. All rights reserved.</p>
    </div>

</body>
</html>
