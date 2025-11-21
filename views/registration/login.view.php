<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main class="bg-gray-200 min-h-screen">
    <div class="flex justify-center items-center min-h-screen py-20">
        <div class="bg-white rounded-lg p-10 w-full max-w-md">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <svg width="64" height="48" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #7c3aed;">
                    <path d="M2 12C2 12 6 8 10 8C14 8 18 12 22 12C26 12 30 8 30 8" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                    <path d="M2 16C2 16 6 12 10 12C14 12 18 16 22 16C26 16 30 12 30 12" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>

            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">
                Log in to your account
            </h2>

            <form method="POST" action="/login">
                <?php if (!empty($errors['email'])): ?>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-4">
                        <p class="text-red-600 text-sm"><?= htmlspecialchars($errors['email']) ?></p>
                        <?php if (strpos($errors['email'], "doesn't have a password") !== false): ?>
                            <p class="text-red-600 text-sm mt-2">
                                <a href="/registration/create" class="underline font-semibold">Click here to register and set your password</a>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <label class="block text-gray-700 font-semibold mb-1">Email address</label>
                <input
                        type="email"
                        name="email"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        placeholder="joe2@joe.com"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg mb-4 focus:outline-none focus:border-purple-600 transition"
                        required
                >

                <?php if (!empty($errors['password'])): ?>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-4">
                        <p class="text-red-600 text-sm"><?= htmlspecialchars($errors['password']) ?></p>
                    </div>
                <?php endif; ?>

                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <input
                        type="password"
                        name="password"
                        placeholder="••••"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg mb-6 focus:outline-none focus:border-purple-600 transition"
                        required
                >

                <button
                        type="submit"
                        class="w-full accent-bg text-white p-3 rounded-lg text-lg font-semibold hover:bg-purple-700 transition">
                    Login
                </button>
            </form>

        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

