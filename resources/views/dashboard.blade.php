<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Status Card -->
            <div class="bg-white shadow-md col-span-3 rounded-lg p-4 mb-4">
                <div class="flex items-center">
                    <i class="fas fa-tachometer-alt text-blue-500 text-2xl"></i>
                    <h1 class="text-2xl font-semibold ml-2">Status Transaksi</h1>
                </div>
                <p class="mt-2">Ada {{ $pendingTransactions }} Transaksi Belum Diselesaikan</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
                <!-- Transaksi Hari Ini -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex gap-2">
                        <i class="fas fa-shopping-cart text-blue-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-blue-600">Transaksi Hari Ini</h2>
                    </div>
                    <p class="mt-2 text-3xl font-bold">{{ $todayTransactions }}</p>
                    <p class="text-gray-500">Total transaksi yang dibuat hari ini</p>
                </div>

                <!-- Pendapatan Hari Ini -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex gap-2">
                        <i class="fas fa-money-bill-wave text-green-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-green-600">Pendapatan Hari Ini</h2>
                    </div>
                    <p class="mt-2 text-3xl font-bold">Rp {{ number_format($todayIncome, 0, ',', '.') }}</p>
                    <p class="text-gray-500">Total pendapatan dari transaksi hari ini</p>
                </div>

                <!-- Total Pelanggan -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex gap-2">
                        <i class="fas fa-users text-blue-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-blue-600">Total Pelanggan</h2>
                    </div>
                    <p class="mt-2 text-3xl font-bold">{{ $totalCustomers }}</p>
                    <p class="text-gray-500">Jumlah pelanggan yang datang hari ini</p>
                </div>
            </div>

            <!-- Salary Distribution Section -->
            <div class="bg-white shadow-md rounded-lg p-4 mb-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-chart-pie text-purple-500 text-2xl"></i>
                    <h1 class="text-2xl font-semibold ml-2">Distribusi Pendapatan Hari Ini</h1>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Biaya Makan -->
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex gap-2 items-center">
                            <i class="fas fa-utensils text-red-600 text-xl"></i>
                            <h3 class="font-semibold text-red-800">Biaya Makan</h3>
                        </div>
                        <p class="mt-2 text-2xl font-bold text-red-600">Rp
                            {{ number_format($mealExpense, 0, ',', '.') }}</p>
                    </div>

                    <!-- Kasir -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex gap-2 items-center">
                            <i class="fas fa-cash-register text-green-600 text-xl"></i>
                            <h3 class="font-semibold text-green-800">Bagian Kasir</h3>
                        </div>
                        <p class="mt-2 text-2xl font-bold text-green-600">Rp
                            {{ number_format($cashierSalary, 0, ',', '.') }}</p>

                    </div>

                    <!-- Owner -->
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                        <div class="flex gap-2 items-center">
                            <i class="fas fa-user-tie text-purple-600 text-xl"></i>
                            <h3 class="font-semibold text-purple-800">Bagian Owner</h3>
                        </div>
                        <p class="mt-2 text-2xl font-bold text-purple-600">Rp
                            {{ number_format($ownerShare, 0, ',', '.') }}</p>

                    </div>

                    <!-- Karyawan -->
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex gap-2 items-center">
                            <i class="fas fa-users text-yellow-600 text-xl"></i>
                            <h3 class="font-semibold text-yellow-800">Bagian Karyawan</h3>
                        </div>
                        <p class="mt-2 text-2xl font-bold text-yellow-600">Rp
                            {{ number_format($employeeShare, 0, ',', '.') }}</p>

                    </div>
                </div>

                <div class="mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="font-medium text-gray-700 mb-2">Catatan Perhitungan:</h3>
                    <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                        <li>Biaya makan (Rp {{ number_format($mealExpense, 0, ',', '.') }}) diambil dari total
                            pendapatan</li>
                        <li>Sisa pendapatan setelah biaya makan: Rp
                            {{ number_format($todayIncome - $mealExpense, 0, ',', '.') }}</li>
                        <li>Pembagian dilakukan berdasarkan persentase dari sisa pendapatan</li>
                    </ul>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex items-center mb-4">
                    <i class="fas fa-history text-blue-500 text-2xl"></i>
                    <h1 class="text-2xl font-semibold ml-2">Transaksi Terbaru</h1>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pelanggan</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Layanan</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $transaction->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $transaction->customer->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $transaction->service->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($transaction->status == 'completed')
                                            <span
                                                class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Selesai</span>
                                        @elseif ($transaction->status == 'pending')
                                            <span
                                                class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Menunggu</span>
                                        @elseif ($transaction->status == 'canceled')
                                            <span
                                                class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Dibatalkan</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">Tidak
                                                Diketahui</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Tidak ada transaksi terbaru
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
