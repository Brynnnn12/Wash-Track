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
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">
    <!-- Loading Spinner -->
    <x-home.loading />

    <div class="flex min-h-screen" x-data="{ open: false }">
        <!-- Sidebar -->
        <x-dashboard.sidebar />

        <!-- Main Content -->
        <div class=" flex-1 flex flex-col overflow-hidden lg:ml-64">
            <!-- Navbar -->
            <x-dashboard.navbar />

            <!-- Message -->
            <x-dashboard.message />

            <!-- Page Content -->
            <main class="flex-1 p-6  bg-gray-100">
                <div class="container mx-auto ">
                    {{ $slot }}
                </div>
            </main>
            <x-dashboard.footer />
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
