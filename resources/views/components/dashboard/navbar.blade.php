<!-- filepath: d:\Latihan\leave-management\resources\views\components\dashboard\navbar.blade.php -->
<div class="bg-white shadow-md px-6 py-3 flex items-center justify-between border-b border-gray-100">
    <!-- Mobile menu button -->
    <button @click="open = !open"
        class="text-gray-600 hover:text-blue-600 focus:outline-none transition-colors duration-200 lg:hidden"
        aria-label="Toggle menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Welcome and User Profile -->
    <div class="flex items-center gap-4 ml-auto">
        <!-- Welcome message (simple text) -->
        <span class="hidden sm:block text-gray-700 font-medium">Hi, {{ auth()->user()->name }}</span>

        <!-- Avatar with dropdown -->
        <div x-data="{ openAvatarMenu: false }" class="relative">
            <button @click="openAvatarMenu = !openAvatarMenu"
                class="flex items-center justify-center h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold shadow-sm hover:shadow-md transition-all focus:outline-none focus:ring-2 focus:ring-blue-300"
                aria-label="User menu">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </button>

            <!-- Avatar dropdown menu -->
            <div x-show="openAvatarMenu" x-cloak @click.away="openAvatarMenu = false"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                <div class="px-4 py-2 text-sm text-gray-500 border-b border-gray-100">
                    Signed in as <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-user-cog mr-2 text-sm"></i> Profile Settings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-red-600 transition-colors">
                        <i class="fas fa-sign-out-alt mr-2 text-sm"></i> Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
