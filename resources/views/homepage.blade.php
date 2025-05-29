<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Homepage | CoffeOptic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#3e2f2f] via-[#57443f] to-[#2f2a2a] min-h-screen text-white font-sans pt-20">

    @include('layouts.navbar')

    <div class="flex flex-col items-center justify-center mt-24 px-6 text-center">
        <h1 class="text-4xl font-bold text-white mb-4">
            Selamat Datang di <span class="text-[#d3a366]">CoffeOptic</span>
        </h1>
        <p class="text-lg mb-8">
            Kamu berhasil login. Alat sortasi kopi siap bekerja! Nyalakan alat untuk mulai menyortir biji kopi terbaikmu.
        </p>

        <!-- ✅ Notifikasi dari session -->
        @if (session('status'))
            <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-2 rounded mb-4 text-sm w-full max-w-md">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6 mt-4">

            <!-- Form ON -->
            <form action="{{ url('/alat/kontrol') }}" method="POST">
                @csrf
                <input type="hidden" name="command" value="ON">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                    Nyalakan Alat
                </button>
            </form>

            <!-- Form OFF -->
            <form action="{{ url('/alat/kontrol') }}" method="POST">
                @csrf
                <input type="hidden" name="command" value="OFF">
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded">
                    Matikan Alat
                </button>
            </form>

        </div>

        <br>
        <h4 class="text-xl font-bold text-white mt-6">
            Sebelum menyalakan alat, harap nyalakan panduan terlebih dahulu.
        </h4>
    </div>

</body>
</html>
