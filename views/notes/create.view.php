<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-10 w-auto" />
        <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-white">Create an account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <!-- Success message -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <form action="/registration/create" method="POST" class="space-y-6">

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-100">Name</label>
                <div class="mt-2">
                    <input id="name" type="text" name="name" required autocomplete="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm" />
                </div>
                <?php if(isset($errors['name'])): ?>
                    <div class="text-red-600"><?= $errors['name'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-100">Email address</label>
                <div class="mt-2">
                    <input id="email" type="email" name="email" required autocomplete="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm" />
                </div>
                <?php if(isset($errors['email'])): ?>
                    <div class="text-red-600"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                <div class="mt-2">
                    <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm" />
                </div>
                <?php if(isset($errors['password'])): ?>
                    <div class="text-red-600"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold text-white hover:bg-indigo-400">
                    Register
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-400">
            Already have an account?
            <a href="/login" class="font-semibold text-indigo-400 hover:text-indigo-300">Sign in here</a>
        </p>
    </div>
</div>

<?php
require basePath('views/partials/footer.php');
?>





