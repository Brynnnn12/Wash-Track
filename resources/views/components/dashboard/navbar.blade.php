<!-- filepath: d:\Latihan\leave-management\resources\views\components\dashboard\navbar.blade.php -->
<div class="bg-white shadow px-4 py-4 flex items-center justify-between">
    <!-- Tombol untuk membuka sidebar -->
    <button @click="open = !open" class="text-gray-500 focus:outline-none focus:ring lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>

    <!-- Selamat Datang dan Avatar -->
    <div class="flex items-center gap-4 ml-auto">
        <!-- Teks Selamat Datang -->
        <span class="hidden sm:block text-gray-800 font-semibold">Selamat Datang, {{ auth()->user()->name }}</span>

        <!-- Avatar dengan inisial nama -->
        <div class="h-10 w-10 flex items-center justify-center bg-blue-500 text-white font-bold rounded-full">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
    </div>
</div>
