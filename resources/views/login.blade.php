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

        {{-- Display session error --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 text-sm rounded px-4 py-2 mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Display validation errors --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 text-sm rounded px-4 py-2 mb-4">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" id="username" name="username" 
                       value="{{ old('username') }}"
                       required autofocus
                       class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#a77b4c] focus:border-transparent @error('username') border-red-500 @enderror">
                @error('username')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#a77b4c] focus:border-transparent @error('password') border-red-500 @enderror">
                
                <!-- Toggle Button -->
                <button type="button" onclick="togglePassword()" 
                        class="absolute right-3 top-9 text-gray-500 focus:outline-none">
                    <!-- Eye open icon -->
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                    </svg>
                    <!-- Eye off icon -->
                    <svg id="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.056 10.056 0 012.123-3.568m1.93-1.93A9.955 9.955 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.05 10.05 0 01-4.187 5.042M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18" />
                    </svg>
                </button>

                @error('password')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-[#a77b4c] hover:bg-[#8c6540] text-white font-semibold text-sm py-2 rounded-lg transition duration-200">
                Login
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");
            const eyeOffIcon = document.getElementById("eyeOffIcon");

            const isPassword = passwordInput.type === "password";
            passwordInput.type = isPassword ? "text" : "password";
            eyeIcon.classList.toggle("hidden", !isPassword);
            eyeOffIcon.classList.toggle("hidden", isPassword);
        }
    </script>
</body>
</html>
