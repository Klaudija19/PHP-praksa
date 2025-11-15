<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold"> Sorry. Page Not Found</h1>

        <p class="mt-4">
            <a href="/" class="text-blue underline"> Go back home</a>
        </p>
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
