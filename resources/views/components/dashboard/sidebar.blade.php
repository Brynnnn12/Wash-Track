<!-- filepath: d:\Latihan\leave-management\resources\views\components\dashboard\sidebar.blade.php -->
<div class="fixed inset-y-0 left-0 bg-blue-800 text-white w-64 transform transition-transform duration-300 lg:translate-x-0"
    :class="{ '-translate-x-full': !open }">
    <!-- Header -->
    <div class="p-4 text-lg font-bold pb-6 border-b border-blue-700 flex gap-8  items-center">
        <i class="fa-solid fa-newspaper"></i>
        <span class=" whitespace-nowrap text-2xl">Wash Track</span>
        <!-- Logo -->

        <!-- Close Button -->
        <button @click="open = false" class="text-white focus:outline-none lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="mt-4 ml-4 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        @role('Admin')
            <!-- Pengajuan Cuti -->
            <a href="{{ route('dashboard.customers.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
                <i class="fa-solid fa-envelope"></i>
                <span>Pelanggan</span>
            </a>
            <a href="{{ route('dashboard.services.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
                <i class="fa-solid fa-envelope"></i>
                <span>Layanan</span>
            </a>
            <a href="{{ route('dashboard.transactions.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
                <i class="fa-solid fa-envelope"></i>
                <span>Transaksi</span>
            </a>
            <a href="{{ route('dashboard.reports.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
                <i class="fa-solid fa-envelope"></i>
                <span>Laporan</span>
            </a>


            <!-- Profile -->
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
                <i class="fa-solid fa-face-smile"></i>
                <span>Profile</span>
            </a>
        @endrole
        @role('User')
            <!-- Profile -->
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition">
                <i class="fa-solid fa-face-smile"></i>
                <span>Profile</span>
            </a>
        @endrole


        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium hover:bg-blue-700 rounded-md transition w-full text-left">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</div>
