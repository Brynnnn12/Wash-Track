<x-app-layout>
    <div class="bg-white p-6 rounded-xl ">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Tambah Jenis Cuti
            </h3>

            <a href="{{ route('dashboard.services.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.services.store') }}" method="POST">
            @csrf

            <div class="space-y-6 max-w-6xl">
                <div>
                    <x-input-label for="name" value="Name" />

                    <x-text-input id="name" name="name" value="{{ old('name') }}" required />

                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="price" value="Harga" />

                    <x-text-input id="price" name="price" value="{{ old('price') }}" required />

                    <x-input-error :messages="$errors->get('price')" class="mt-1" />
                </div>
                <div class="flex justify-end">
                    <x-primary-button>
                        <i class="fas fa-save mr-2"></i> Simpan
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
