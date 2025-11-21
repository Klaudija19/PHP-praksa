<nav class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">

            <!-- Left section -->
            <div class="flex items-center space-x-8">
                <!-- Blue-purple wavy logo -->
                <a href="/" class="text-2xl font-bold" style="color: #7c3aed;">
                    <svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12C2 12 6 8 10 8C14 8 18 12 22 12C26 12 30 8 30 8" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        <path d="M2 16C2 16 6 12 10 12C14 12 18 16 22 16C26 16 30 12 30 12" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </a>

                <a href="/" class="hover:text-gray-300">Home</a>
                <a href="/about" class="hover:text-gray-300">About</a>
                <a href="/notes" class="hover:text-gray-300">Notes</a>
                <a href="/contact" class="hover:text-gray-300">Contact</a>
            </div>

            <!-- Right side: Login / Register -->
            <div class="flex items-center space-x-6">

                <?php if (!isset($_SESSION['user'])): ?>
                    <!-- Bell icon -->
                    <svg class="w-5 h-5 hover:text-gray-300 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <a href="/login" class="hover:text-gray-300">Login</a>
                    <a href="/registration/create" class="px-4 py-2 rounded" style="background-color: #7c3aed; color: white;" onmouseover="this.style.backgroundColor='#6d28d9'" onmouseout="this.style.backgroundColor='#7c3aed'">
                        Register
                    </a>
                <?php else: ?>
                    <!-- Bell icon -->
                    <svg class="w-5 h-5 hover:text-gray-300 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="text-gray-300">
                        <?= htmlspecialchars($_SESSION['user']['email']) ?>
                    </span>

                    <form action="/logout" method="POST">
                        <button class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</nav>
