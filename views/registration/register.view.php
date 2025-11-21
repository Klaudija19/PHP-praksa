<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <!-- Left navigation -->
        <nav class="flex space-x-6">
            <a href="/" class="hover:text-gray-300">Home</a>
            <a href="/about" class="hover:text-gray-300">About</a>
            <a href="/notes" class="hover:text-gray-300">Notes</a>
            <a href="/contact" class="hover:text-gray-300">Contact</a>
        </nav>

        <!-- Right navigation -->
        <div class="flex space-x-4">
            <a href="/register" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Register</a>
            <a href="/login" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600">Login</a>
        </div>
    </div>
</header>

<!-- Registration form -->
<main class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register for a new account</h2>
        <form action="/register" method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="Email address" class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded hover:bg-blue-700">Register</button>
        </form>
    </div>
</main>

</body>
</html>

