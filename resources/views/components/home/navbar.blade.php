    <nav class="bg-tranparent fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Judul Aplikasi -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-blue-500 font-bold text-2xl">WashTrack</span>
                </div>

                <!-- Tombol Login/Logout -->
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <!-- Jika sudah login -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition duration-300 flex items-center gap-2">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    @else
                        <!-- Jika belum login -->
                        <a href="{{ route('login') }}"
                            class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
