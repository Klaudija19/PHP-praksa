<?php require __DIR__ . '/partials/head.php' ?>
<?php require __DIR__ . '/partials/nav.php' ?>
<?php require __DIR__ . '/partials/banner.php' ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p>Hello. Welcome to the home page. </p>
        </div>
    </main>

<?php require __DIR__ . '/partials/footer.php' ?>


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


