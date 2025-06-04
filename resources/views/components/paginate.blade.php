@props(['paginator'])

<div class="px-6 py-4 flex items-center justify-between border-t border-gray-200">
    <div class="text-sm text-gray-500">
        Showing
        <span class="font-medium">{{ $paginator->firstItem() ?? 0 }}</span>
        to
        <span class="font-medium">{{ $paginator->lastItem() ?? 0 }}</span>
        of
        <span class="font-medium">{{ $paginator->total() }}</span>
        items
    </div>

    @if ($paginator->hasPages())
        <div class="flex space-x-2 items-center">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span
                    class="px-2 py-1 border border-gray-300 rounded-md text-sm text-gray-400 bg-white cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-2 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Current Page Only --}}
            <span class="px-3 py-1 border border-gray-300 rounded-md text-sm bg-blue-600 text-white">
                {{ $paginator->currentPage() }}
            </span>


            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-2 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span
                    class="px-2 py-1 border border-gray-300 rounded-md text-sm text-gray-400 bg-white cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>
    @endif
</div>
