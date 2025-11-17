<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-6">Notes</h1>

        <!-- Flash Messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                <?= $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <!-- Листа на белешки -->
        <ul class="space-y-4 mb-6">
            <?php foreach ($notes as $note) : ?>
                <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow">

                    <!-- Приказ на белешката -->
                    <a href="/note/<?= $note['id'] ?>" class="text-blue-600 font-semibold hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>

                    <!-- Копчиња Edit / Delete -->
                    <div class="flex items-center space-x-3">

                        <!-- EDIT -->
                        <a href="/note/edit/<?= $note['id'] ?>"
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form method="POST" action="/notes/delete"
                              onsubmit="return confirm('Are you sure you want to delete this note?')">
                            <input type="hidden" name="id" value="<?= $note['id'] ?>">
                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>

                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Линк за Create Note -->
        <p>
            <a href="/notes/create"
               class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">
                Create Note
            </a>
        </p>

    </div>
</main>

<?php
require basePath('views/partials/footer.php');
?>

