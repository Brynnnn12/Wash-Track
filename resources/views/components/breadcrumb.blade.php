@props(['links' => []])

<nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-1">
        <li class="flex items-center">
            <i class="fa-solid fa-house"></i>
            <a href="{{ route('dashboard') }}" class="ml-2 text-blue-600 hover:underline">Dashboard</a>
        </li>

        @foreach ($links as $label => $url)
            <li class="flex items-center">
                <svg class="h-5 w-5 text-gray-400 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>

                @if ($url)
                    <a href="{{ $url }}" class="text-blue-600 hover:underline">{{ $label }}</a>
                @else
                    <span class="text-gray-700 font-medium">{{ $label }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
