    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 lg:h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <i class="fa-solid fa-car fa-2xl text-blue-600"></i>
                    <span class="ml-2 text-xl font-semibold text-gray-800">Wash Track</span>
                </div>
                <!-- Tombol Login/Register -->
                <div class="flex items-center space-x-3">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition flex items-center gap-2">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition flex items-center gap-2">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
