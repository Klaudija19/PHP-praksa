<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

<div class="flex min-h-screen flex-col justify-center px-4 py-12 sm:px-6 lg:px-8 bg-gray-900">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-12 w-auto" />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-white">Create an account</h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-gray-800 py-8 px-6 shadow rounded-lg sm:px-10">

            <!-- Success message -->
            <?php if(isset($_SESSION['success'])): ?>
                <div class="bg-green-200 text-green-800 p-3 mb-4 rounded text-center">
                    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <form action="/registration/create" method="POST" class="space-y-6">

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-200">Name</label>
                    <div class="mt-1">
                        <input id="name" type="text" name="name" required autocomplete="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 text-white bg-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <?php if(isset($errors['name'])): ?>
                        <p class="mt-1 text-sm text-red-500"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200">Email address</label>
                    <div class="mt-1">
                        <input id="email" type="email" name="email" required autocomplete="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 text-white bg-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <?php if(isset($errors['email'])): ?>
                        <p class="mt-1 text-sm text-red-500"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 text-white bg-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <?php if(isset($errors['password'])): ?>
                        <p class="mt-1 text-sm text-red-500"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-sm text-gray-400">
                Already have an account?
                <a href="/login" class="font-medium text-indigo-400 hover:text-indigo-300">Sign in here</a>
            </p>
        </div>
    </div>
</div>

<?php
require basePath('views/partials/footer.php');
?>


