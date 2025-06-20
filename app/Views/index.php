<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-100">
  <div class="flex h-full">

    <!-- Left side (2/3 background image) -->
    <div class="hidden lg:block lg:w-4/5 bg-cover bg-center"
         style="background-image: url('<?= base_url('assets/images/bg.jpg') ?>');">
    </div>

    <!-- Right side (1/3 login) -->
    <div class="w-full lg:w-1/4 flex items-center justify-center bg-white p-8 ml-auto">
      <div class="max-w-md w-full space-y-8">
	  	<div>
          <h1 class="text-center text-2xl font-extrabold text-gray-900">Richeese Verklaring Management</h1>
        </div>

        <div>
          <h2 class="text-center text-1xl font-extrabold text-gray-900">Sign in</h2>
        </div>

        <form class="mt-8 space-y-6" action="<?= base_url('/login') ?>" method="post">
          <?= csrf_field() ?>

          <div class="space-y-4">
            <div>
              <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
              <input id="username" name="username" type="text" required class="appearance-none rounded w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <input id="password" name="password" type="password" required class="appearance-none rounded w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
          </div>

          <?php if(session()->getFlashdata('error')): ?>
            <div class="text-red-600 text-sm mb-2 notif">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>

          <div class="flex items-center justify-between">
            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div>

          <button type="submit"
                  class="w-full mt-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
            Sign In
          </button>
        </form>
      </div>
    </div>

  </div>
</body>

<script>
	
</script>

</html>
