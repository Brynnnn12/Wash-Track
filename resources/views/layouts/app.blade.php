<!-- filepath: d:\Latihan\leave-management\resources\views\layouts\app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex min-h-screen" x-data="{ open: false }">
        <!-- Sidebar -->
        <x-dashboard.sidebar />

        <!-- Main Content -->
        <div class=" flex-1 flex flex-col overflow-hidden lg:ml-64">
            <!-- Navbar -->
            <x-dashboard.navbar />

            <!-- Page Content -->
            <main class="flex-1 p-6  bg-gray-100">
                <div class="container mx-auto ">
                    {{ $slot }}
                </div>
            </main>
            <footer class="bg-white border-t border-gray-200 py-4">
                <div class="max-w-6xl mx-auto px-4 text-center text-gray-500 text-sm">
                    <p>&copy; <span id="year"></span> PT. Mencari Cinta Sejati Digital. All rights reserved.</p>
                </div>
            </footer>

        </div>

    </div>



</body>

</html>
{{-- <!-- filepath: d:\Latihan\leave-management\resources\views\layouts\app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen" x-data="{ open: false }">
        <!-- Sidebar -->
        <x-dashboard.sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">
            <!-- Navbar (Sticky) -->
            <div class="sticky top-0 z-50 bg-white shadow">
                <x-dashboard.navbar />
            </div>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <div class="container mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>


</html> --}}
