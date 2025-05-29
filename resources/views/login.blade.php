<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | CoffeOptic</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#3e2f2f] via-[#57443f] to-[#2f2a2a] min-h-screen flex items-center justify-center font-[Inter] px-4">

    <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-6 sm:p-8">
        <h2 class="text-xl sm:text-2xl font-semibold text-center text-[#3e2f2f] mb-6">
            Masuk ke <span class="text-[#a77b4c]">CoffeOptic</span>
        </h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 text-sm rounded px-4 py-2 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="username" id="username" name="username" required autofocus
                       class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#a77b4c] focus:border-transparent">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#a77b4c] focus:border-transparent">
            </div>

            <button type="submit"
                    class="w-full bg-[#a77b4c] hover:bg-[#8c6540] text-white font-semibold text-sm py-2 rounded-lg transition duration-200">
                Login
            </button>
        </form>
    </div>

</body>
</html>
