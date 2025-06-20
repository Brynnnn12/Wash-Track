<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100">
    <!-- Loading Spinner -->
    <x-home.loading />
    <div class="min-h-screen flex flex-col items-center justify-center w-auto bg-cover bg-center p-4 sm:p-6"
        style="background-image: url('{{ asset('assets/auth1.png') }}'); background-size: contain; background-repeat: no-repeat;">

        <div
            class="w-full max-w-sm sm:max-w-md px-4 py-4 sm:px-6 sm:py-8 bg-white/85 shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
