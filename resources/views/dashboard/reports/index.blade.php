<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'Laporan' => null,
        ]" />


        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Laporan</h3>
            <div class="flex space-x-2 mt-4 md:mt-0">
                <x-link href="{{ route('dashboard.reports.create') }}">
                    <i class="fas fa-plus mr-2"></i> Tambah Laporan
                </x-link>
                <x-link href="{{ route('dashboard.reports.pdf') }}" target="_blank" class="bg-red-600 text-white">
                    <i class="fas fa-file-pdf mr-2"></i> Cetak
                </x-link>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Laporan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            Pendapatan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            Transaksi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($reports as $index => $report)
                        <tr>
                            <!-- Nomor -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration + ($reports->currentPage() - 1) * $reports->perPage() }}
                            </td>

                            <!-- Tanggal Laporan -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ \Carbon\Carbon::parse($report->report_date)->format('d M Y') }}
                            </td>

                            <!-- Total Income -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Rp {{ number_format($report->total_income, 0, ',', '.') }}
                            </td>

                            <!-- Total Transactions -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $report->total_transactions }}
                            </td>

                            <!-- Aksi -->
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-action-buttons :item="$report" editRoute="dashboard.reports.edit"
                                    deleteRoute="dashboard.reports.destroy" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada laporan ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <x-paginate :paginator="$reports" />
    </div>
</x-app-layout>
