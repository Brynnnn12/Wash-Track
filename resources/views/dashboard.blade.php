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
                        <i class="fas fa-dollar text-green-500 text-xl"></i>

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
                                            <span class="text-green-500 text-sm font-semibold">Selesai</span>
                                        @elseif ($transaction->status == 'pending')
                                            <span class="text-yellow-500 text-sm font-semibold">Menunggu</span>
                                        @elseif ($transaction->status == 'canceled')
                                            <span class="text-red-500 text-sm font-semibold">Dibatalkan</span>
                                        @else
                                            <span class="text-gray-500 text-sm font-semibold">Tidak Diketahui</span>
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
