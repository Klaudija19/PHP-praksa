<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php') ?>


    <main class="bg-gray-200 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-8 shadow-sm">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">Welcome to Home Page</h1>
                <p class="text-gray-600 text-lg">Hello. Welcome to the home page.</p>
            </div>
        </div>
    </main>

<?php require basePath('views/partials/footer.php') ?>


<!-- JavaScript за dropdown -->
<script>
    const userButton = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('dropdown-menu');

    userButton.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('hidden');
    });

    // затворање при клик надвор
    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target) && !userButton.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>


