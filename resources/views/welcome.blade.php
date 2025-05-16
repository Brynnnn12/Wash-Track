<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Track</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-height {
            min-height: calc(100vh - 128px);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <x-dashboard.message />
    <!-- Navbar Sederhana -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <!-- Ganti icon dengan icon mobil -->
                    <i class="fa-solid fa-car fa-2xl"></i>
                    <span class="ml-2 text-xl font-semibold text-gray-800">Wash Track</span>
                </div>
                <!-- Tombol Login/Register -->
                <div class="flex items-center space-x-3">
                    @auth

                        <form method="POST" action="{{ route('logout') }}" class="">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Login</a>

                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="h-screen bg-gradient-to-br from-blue-50 to-white flex items-center justify-center p-4">
        <div class="max-w-xl mx-auto text-center px-4 py-12">
            <!-- Animated Car Wash Icon -->
            <div class="mb-8 animate-bounce">
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
    <footer class="bg-white border-t border-gray-200 py-4">
        <div class="max-w-6xl mx-auto px-4 text-center text-gray-500 text-sm">
            <p>&copy; <span id="year"></span> PT. Mencari Cinta Sejati Digital. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Auto update year in footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
