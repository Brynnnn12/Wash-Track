<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Track</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans antialiased">
    <!-- Message Alert -->
    <x-dashboard.message />

    <x-home.navbar />

    <!-- Hero Section with Background Image -->
    <main class="flex items-center justify-end min-h-screen w-auto bg-cover bg-center"
        style="background-image: url('{{ asset('assets/bg.png') }}'); background-size: contain; background-repeat: no-repeat;">
        <div class="max-w-xl mr-16 text-left px-4 py-2">

            <!-- Main Heading -->
            <div class="mb-6">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold lg:text-white text-gray-800 mb-4">
                    Selamat Datang di
                    <span x-data="{ colors: ['#3b82f6', '#06b6d4', '#3b82f6'], currentIndex: 0 }" x-init="setInterval(() => { currentIndex = (currentIndex + 1) % colors.length }, 1000)" :style="`color: ${colors[currentIndex]}`"
                        class="transition-colors duration-1000">
                        WashTrack
                    </span>
                </h1>
            </div>

            <!-- Tagline -->
            <div class="mb-8">
                <p class="text-lg sm:text-xl text-white">
                    Aplikasi Manajemen Cuci Mobil yang Mudah dan Efisien
                </p>
            </div>

            <!-- CTA Button -->
            <div class="flex space-x-4">
                <a href="{{ route('dashboard') }}"
                    class="px-8 py-4 bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold rounded-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 shadow-md">
                    Mulai Menggunakan WashTrack
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <x-home.footer />
    <script>
        // Auto update year in footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
