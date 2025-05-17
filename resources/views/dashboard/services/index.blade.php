<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'Services' => null,
        ]" />


        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar services</h3>
            <x-link href="{{ route('dashboard.services.create') }}">
                <i class="fas fa-plus mr-2"></i> Tambah Customer
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
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Harga
                        </th>

                        <th scope="col"
                            class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($services as $index => $service)
                        <tr class="text-center">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ ($services->currentPage() - 1) * $services->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $service->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                Rp {{ number_format($service->price, 0, ',', '.') }}

                            </td>


                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                <x-action-buttons :item="$service" editRoute="dashboard.services.edit"
                                    deleteRoute="dashboard.services.destroy" />
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->

        <x-paginate :paginator="$services" />


    </div>
</x-app-layout>
