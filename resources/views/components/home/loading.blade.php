<div x-data="{ loading: true }" x-init="window.addEventListener('load', () => setTimeout(() => loading = false, 1500))" x-show="loading"
    x-transition:leave="transition-opacity duration-500 ease-in-out" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 backdrop-blur-sm">

    <div class="relative flex flex-col items-center space-y-6">
        <!-- Container for spinner and GIF -->
        <div class="relative w-32 h-32 flex items-center justify-center">
            <!-- Animated gradient ring -->
            <div
                class="absolute w-full h-full rounded-full border-4 border-transparent 
                        border-t-blue-500 border-r-emerald-400 border-b-purple-500 border-l-amber-400
                        animate-spin [animation-duration:2s]">
            </div>

            <!-- Your GIF with pulse animation -->
            <img src="{{ asset('assets/car.gif') }}" alt="Loading"
                class="w-24 h-24 object-cover rounded-full animate-pulse [animation-duration:1.5s]">
        </div>

        <!-- Text with typing animation -->
        <div class="text-center space-y-2">
            <h3 class="text-xl font-semibold text-gray-800">Memuat Konten</h3>
            <div class="text-sm text-gray-500 flex justify-center items-center">
                <span
                    class="inline-block w-3 h-3 bg-blue-500 rounded-full mr-1 animate-bounce [animation-delay:-0.3s]"></span>
                <span
                    class="inline-block w-3 h-3 bg-blue-500 rounded-full mr-1 animate-bounce [animation-delay:-0.15s]"></span>
                <span class="inline-block w-3 h-3 bg-blue-500 rounded-full animate-bounce"></span>
            </div>
        </div>
    </div>
</div>
