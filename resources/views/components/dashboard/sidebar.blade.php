<!-- filepath: d:\Latihan\leave-management\resources\views\components\dashboard\sidebar.blade.php -->
<div class="fixed inset-y-0 left-0 bg-gradient-to-b from-blue-800 to-blue-900 text-white w-64 transform transition-all duration-300 ease-in-out lg:translate-x-0 shadow-xl z-50"
    :class="{ '-translate-x-full': !open }">
    <!-- Header -->
    <div class="p-2 pb-1 border-b border-blue-700/50 flex items-center justify-between">
        <div class="flex justify-center items-center gap-3">
            <div class="bg-white/10 p-3 rounded-lg">
                <i class="fa-solid fa-car text-xl"></i>
            </div>
            <span class="text-2xl font-bold tracking-tight whitespace-nowrap">Wash Track</span>
        </div>

        <!-- Close Button -->
        <button @click="open = false"
            class="text-white/70 hover:text-white focus:outline-none transition-colors lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="mt-4 px-3 space-y-1.5">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
            :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard') }">
            <div class="w-8 h-8 flex items-center justify-center">
                <i class="fa-solid fa-house text-white/80 group-hover:text-white"></i>
            </div>
            <span class="font-medium">Dashboard</span>
        </a>

        @role('Admin')
            <!-- Users -->
            <a href="{{ route('dashboard.users.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.users.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-user-shield text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Karyawan</span>
            </a>
            <!-- Customers -->
            <a href="{{ route('dashboard.customers.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.customers.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-users text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Pelanggan</span>
            </a>

            <!-- Services -->
            <a href="{{ route('dashboard.services.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.services.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-broom text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Layanan</span>
            </a>

            <!-- Transactions -->
            <a href="{{ route('dashboard.transactions.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.transactions.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-receipt text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Transaksi</span>
            </a>

            <!-- Reports -->
            <a href="{{ route('dashboard.reports.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.reports.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-chart-pie text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Laporan</span>
            </a>
        @endrole

        @role('User')
            <!-- Customers -->
            <a href="{{ route('dashboard.customers.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.customers.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-users text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Pelanggan</span>
            </a>
            <!-- Transactions -->
            <a href="{{ route('dashboard.transactions.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.transactions.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-receipt text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Transaksi</span>
            </a>


            <!-- Reports -->
            <a href="{{ route('dashboard.reports.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-lg font-medium rounded-lg transition-all hover:bg-white/10 hover:shadow-md group"
                :class="{ 'bg-white/10 shadow-md': request() - > routeIs('dashboard.reports.*') }">
                <div class="w-8 h-8 flex items-center justify-center">
                    <i class="fa-solid fa-chart-pie text-white/80 group-hover:text-white"></i>
                </div>
                <span class="font-medium">Laporan</span>
            </a>
        @endrole


    </nav>
</div>
