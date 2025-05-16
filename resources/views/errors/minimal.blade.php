<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadein {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="text-center" x-data="{ code: 0, message: '' }" x-init="setTimeout(() => {
        code = @yield('code');
        message = '@yield('message')';
    }, 100);">

        <!-- Error Code -->
        <div class="animate-fadein">
            <h1 class="text-8xl font-bold text-gray-800 mb-2" x-text="code"
                x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">
            </h1>
        </div>

        <!-- Error Message -->
        <div class="animate-fadein" style="animation-delay: 0.3s;">
            <p class="text-2xl text-gray-600 mb-8" x-text="message"></p>
        </div>

        <!-- Icon with subtle bounce -->
        <div class="animate-bounce-slow text-gray-400 mb-8" style="animation-delay: 0.6s;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <!-- Back Button -->
        <div class="animate-fadein" style="animation-delay: 0.9s;">
            <a href="{{ url('/') }}"
                class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-all hover:shadow-md">
                <i class="fas fa-arrow-left mr-2"></i> Back to Home
            </a>
        </div>
    </div>

    <!-- Font Awesome for the icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>
