<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <div class="space-y-12">
                <!-- About дел -->
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Create Note</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
                            <div class="mt-2">
                                <textarea id="body" name="body" rows="3"
                                          placeholder="Here's an idea for a note..."
                                          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1
                                    -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2
                                    focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save копче -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>

<?php require('partials/footer.php') ?>


