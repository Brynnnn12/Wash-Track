<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'Transaksi' => null,
        ]" />

        <!-- Search -->


        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Transaksi</h3>
            <x-link href="{{ route('dashboard.transactions.create') }}">
                <i class="fas fa-plus mr-2"></i> Tambah Transaksi
            </x-link>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            transaction
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Layanan
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Transaksi
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total Pembayaran
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pembayaran
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($transactions as $index => $transaction)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ ($transactions->currentPage() - 1) * $transactions->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ $transaction->customer?->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ $transaction->service?->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ $transaction->transaction_date }}</td>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }} </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{-- Pembayaran: Icon + Teks --}}
                                @if ($transaction->payment_method === 'cash')
                                    <i class="fas fa-money-bill-wave text-green-500 mr-1"></i> Cash
                                @elseif($transaction->payment_method === 'bank_transfer')
                                    <i class="fas fa-university text-blue-500 mr-1"></i> Transfer
                                @elseif($transaction->payment_method === 'credit_card')
                                    <i class="fas fa-credit-card text-yellow-500 mr-1"></i> Kartu Kredit
                                @else
                                    <i class="fas fa-question-circle text-gray-400 mr-1"></i> Tidak Diketahui
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{-- Status: Icon Saja --}}
                                @if ($transaction->status === 'completed')
                                    <i class="fas fa-check-circle text-green-500"></i>
                                @elseif($transaction->status === 'pending')
                                    <i class="fas fa-spinner text-yellow-500"></i>
                                @elseif($transaction->status === 'cancelled')
                                    <i class="fas fa-times-circle text-red-500"></i>
                                @else
                                    <i class="fas fa-question-circle text-gray-400"></i>
                                @endif
                            </td>

                            <td class="flex px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                {{-- jika status selesai tampilkan cetak struk --}}

                                @if ($transaction->status === 'completed')
                                    <a href="{{ route('dashboard.transactions.struk', $transaction->id) }}"
                                        target="_blank">
                                        <i class="fas fa-print mr-2"></i>
                                    </a>
                                @endif
                                <x-action-buttons :item="$transaction" editRoute="dashboard.transactions.edit"
                                    deleteRoute="dashboard.transactions.destroy" />
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->

        <x-paginate :paginator="$transactions" />


    </div>
</x-app-layout>
