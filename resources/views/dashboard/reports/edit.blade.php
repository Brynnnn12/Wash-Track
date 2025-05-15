<x-app-layout>
    <div class="bg-white p-6 rounded-xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Edit Laporan
            </h3>

            <a href="{{ route('dashboard.reports.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.reports.update', $report) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 max-w-6xl">
                {{-- Tanggal Laporan --}}
                <div>
                    <x-input-label for="report_date" value="Tanggal Laporan" />
                    <x-text-input id="report_date" name="report_date" type="date"
                        value="{{ old('report_date', $report->report_date) }}" required />
                    <x-input-error :messages="$errors->get('report_date')" class="mt-1" />
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
