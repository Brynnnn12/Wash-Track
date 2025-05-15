@props(['links' => []])

<nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-1">
        <li class="flex items-center">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7m-9 9v-6h4v6m5 0h-4a2 2 0 01-2-2v-4a2 2 0 012-2h4" />
            </svg>
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
