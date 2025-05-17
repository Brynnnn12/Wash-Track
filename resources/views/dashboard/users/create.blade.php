<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Tambah Karyawan</h3>
            <a href="{{ route('dashboard.users.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-6xl">
                {{-- Name Field --}}
                <div class="">
                    <x-input-label for="name" value="Name" class="font-semibold" />
                    <x-text-input id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full"
                        required />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                {{-- Email Field --}}
                <div class="">
                    <x-input-label for="email" value="Email" class="font-semibold" />
                    <x-text-input id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                {{-- Password Field --}}
                <div class="">
                    <x-input-label for="password" value="Password" class="font-semibold" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                {{-- Role Field - Full Width --}}
                <div class="">
                    <x-input-label for="role" value="Roles" class="font-semibold" />
                    <select id="role" name="role" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                                {{ ucfirst($role) }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-1" />
                </div>

                {{-- Submit Button --}}
                <div class="col-span-1 md:col-span-2 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                        <i class="fas fa-save mr-2"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
