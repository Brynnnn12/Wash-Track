<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-lg card">
        <x-breadcrumb :links="[
            'Laporan' => null,
        ]" />

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b pb-4">
            <h3 class="text-2xl font-bold text-gray-900">Daftar Laporan Keuangan</h3>
            <div class="flex space-x-3 mt-4 md:mt-0">
                <x-link href="{{ route('dashboard.reports.create') }}"
                    class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i> Tambah Laporan
                </x-link>
                <x-link href="{{ route('dashboard.reports.pdf') }}" target="_blank"
                    class="flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200">
                    <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
                </x-link>
            </div>
        </div>

        <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-lg shadow-md">
            <form action="{{ route('dashboard.reports.index') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 items-end">
                    <div>
                        <label for="month" class="block text-sm font-semibold text-gray-800 mb-2">Filter berdasarkan
                            Bulan</label>
                        <select name="month" id="month"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2.5">
                            <option value="">-- Semua Bulan --</option>
                            @foreach (range(1, 12) as $monthNumber)
                                <option value="{{ $monthNumber }}"
                                    {{ request('month') == $monthNumber ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $monthNumber, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-end h-full">
                        <div class="flex items-center">
                            <input type="checkbox" name="this_week" id="this_week" value="1"
                                {{ request('this_week') ? 'checked' : '' }}
                                class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                            <label for="this_week" class="ml-2 block text-md font-medium text-gray-800 cursor-pointer">
                                Minggu Ini
                            </label>
                        </div>
                    </div>

                    <div class="flex items-end h-full">
                        <button type="submit"
                            class="w-full inline-flex justify-center py-3 px-5 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                            <i class="fas fa-filter mr-2"></i> Terapkan Filter
                        </button>
                    </div>

                    @if (request('month') || request('this_week'))
                        <div class="flex items-end h-full">
                            <a href="{{ route('dashboard.reports.index') }}"
                                class="w-full inline-flex justify-center py-3 px-5 border border-gray-300 shadow-sm text-md font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                <i class="fas fa-redo mr-2"></i> Reset Filter
                            </a>
                        </div>
                    @endif
                </div>
            </form>
        </div>


        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Tanggal Laporan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Total Pendapatan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Total Transaksi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($reports as $index => $report)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $loop->iteration + ($reports->currentPage() - 1) * $reports->perPage() }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($report->report_date)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">
                                Rp {{ number_format($report->total_income, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $report->total_transactions }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-action-buttons :item="$report" editRoute="dashboard.reports.edit"
                                    deleteRoute="dashboard.reports.destroy" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 text-lg">
                                <i class="fas fa-info-circle mr-2"></i> Tidak ada laporan ditemukan untuk filter ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            <x-paginate :paginator="$reports" />
        </div>
    </div>
</x-app-layout>
