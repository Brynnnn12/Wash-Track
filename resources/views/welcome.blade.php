<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Track</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 font-sans antialiased">
    <x-dashboard.message />
    <!-- Navbar Sederhana -->
    <x-home.navbar />

    <!-- Hero Section -->
    <main class=" bg-gradient-to-br from-blue-50 to-white flex items-center justify-center p-4">
        <div class="max-w-xl mx-auto text-center px-4 py-12">
            <!-- Animated Car Wash Icon -->
            <div class="mb-8">
                <svg class="mx-auto w-32 h-32 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.25 9V6a1.5 1.5 0 00-1.5-1.5h-9A1.5 1.5 0 002 6v12a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-3M7.5 9.5l5.586-5.586A1 1 0 0114 4.586V9.5m0 0H21m-3.5 3.5H18m-1.5-3.5H12m-8.5 0h3.586a1 1 0 01.707.293l3.414 3.414a1 1 0 00.707.293H17.5" />
                </svg>
            </div>

            <!-- Main Heading -->
            <h1 class="text-5xl font-bold text-gray-800 mb-6">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">WashTrack</span>
            </h1>

            <!-- Tagline -->
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Sistem Manajemen dan Laporan Terintegrasi untuk Bisnis Cucian Mobil
            </p>


            <!-- CTA Button -->
            <div class="flex justify-center space-x-4">
                <a href="{{ route('dashboard') }}"
                    class="px-8 py-4 bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold rounded-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 shadow-md">
                    Mulai Menggunakan WashTrack
                </a>
            </div>


        </div>

    </main>

    <!-- Footer Sederhana -->
    <x-home.footer />

    <script>
        // Auto update year in footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
