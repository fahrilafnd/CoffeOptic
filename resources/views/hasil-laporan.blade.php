<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Penyortiran | CoffeOptic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#3e2f2f] via-[#57443f] to-[#2f2a2a] min-h-screen text-white font-sans pt-20">

    @include('layouts.navbar')

    <div class="max-w-5xl mx-auto mt-20 p-6 bg-white text-black rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-[#a77b4c] mb-6">Hasil Laporan</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-[#3e2f2f] text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Jumlah tersortir</th>
                    <th class="px-4 py-2 text-left">Berat total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($reports as $report)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $report->id }}</td>
                    <td class="px-4 py-2">{{ $report->tanggal }}</td>
                    <td class="px-4 py-2">{{ $report->jumlah_biji_buruk }}</td>
                    <td class="px-4 py-2">{{ $report->total_berat }}gr</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
