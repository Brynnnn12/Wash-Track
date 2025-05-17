<x-app-layout>
    <div class="bg-white p-6 rounded-xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Edit Transactions
            </h3>

            <a href="{{ route('dashboard.transactions.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.transactions.update', $transaction) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2" x-data="{
                search: '{{ $transaction->customer->name }}',
                customers: {{ Js::from($customers) }},
                services: {{ Js::from($services->map(fn($s) => ['id' => $s->id, 'price' => $s->price])) }},
                selectedServiceId: '{{ old('service_id', $transaction->service_id) }}',
                selectedPrice: '{{ old('total_price', $transaction->total_price) }}',
                filteredCustomers() {
                    if (this.search === '') {
                        return this.customers;
                    }
                    return this.customers.filter(c =>
                        c.name.toLowerCase().includes(this.search.toLowerCase()) ||
                        (c.vehicle_plate && c.vehicle_plate.toLowerCase().includes(this.search.toLowerCase())));
                },
                updatePrice() {
                    const service = this.services.find(s => s.id == this.selectedServiceId);
                    this.selectedPrice = service ? service.price : '';
                }
            }">

                {{-- Select Customer --}}
                <div class="col-span-1 sm:col-span-2 p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <x-input-label for="customer_search" value="Pelanggan" class="font-semibold" />

                    <div class="relative" x-data="{ open: false }">
                        <div class="flex">
                            <input type="text" id="customer_search" x-model="search" placeholder="Cari pelanggan..."
                                @focus="open = true" @click.outside="open = false" @keydown.escape="open = false"
                                class="mt-1 block w-full border-gray-300 rounded-l-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />

                            <button type="button" @click="open = !open"
                                class="mt-1 inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 bg-gray-50 text-gray-500 rounded-r-md hover:bg-gray-100">
                                <i class="fas fa-chevron-down" x-show="!open"></i>
                                <i class="fas fa-chevron-up" x-show="open"></i>
                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute z-50 mt-1 w-full bg-white shadow-lg rounded-md border border-gray-200 max-h-60 overflow-y-auto">

                            <div class="p-2 text-sm text-gray-500" x-show="filteredCustomers().length === 0">
                                Tidak ada pelanggan yang ditemukan
                            </div>

                            <template x-for="customer in filteredCustomers()" :key="customer.id">
                                <div @click="search = customer.name; $refs.hiddenCustomerInput.value = customer.id; open = false"
                                    class="p-2 hover:bg-blue-50 cursor-pointer rounded-md flex items-center">
                                    <div
                                        class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 mr-2">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div x-text="customer.name" class="font-medium text-gray-800"></div>
                                        <div class="flex items-center mt-1 text-xs text-gray-500">
                                            <i class="fas fa-car mr-1"></i>
                                            <span
                                                x-text="customer.vehicle_plate ? customer.vehicle_plate : 'No Plat'"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <input type="hidden" id="customer_id" name="customer_id" x-ref="hiddenCustomerInput"
                        value="{{ old('customer_id', $transaction->customer_id) }}" required />
                    <x-input-error :messages="$errors->get('customer_id')" class="mt-1" />

                    <div class="mt-2 text-xs text-gray-500 flex items-center">
                        <i class="fas fa-info-circle mr-1"></i>
                        Ketik untuk mencari atau pilih dari daftar
                    </div>
                </div>

                {{-- Select Service --}}
                <div>
                    <x-input-label for="service_id" value="Layanan" />
                    <select id="service_id" name="service_id" x-model="selectedServiceId" @change="updatePrice()"
                        required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="" disabled>Pilih Layanan</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                                {{ old('service_id', $transaction->service_id) == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('service_id')" class="mt-1" />
                </div>

                {{-- Tanggal Transaksi --}}
                <div>
                    <x-input-label for="transaction_date" value="Tanggal Transaksi" />
                    <x-text-input id="transaction_date" name="transaction_date" type="date"
                        value="{{ old('transaction_date', $transaction->transaction_date) }}" required />
                    <x-input-error :messages="$errors->get('transaction_date')" class="mt-1" />
                </div>

                {{-- Total Harga --}}
                <div>
                    <x-input-label for="total_price" value="Total Pembayaran" />
                    <x-text-input id="total_price" name="total_price_display" x-model="selectedPrice"
                        class="bg-gray-100 cursor-not-allowed" disabled />
                    <input type="hidden" id="total_price_hidden" name="total_price" x-model="selectedPrice" />
                    <x-input-error :messages="$errors->get('total_price')" class="mt-1" />
                </div>

                {{-- Metode Pembayaran --}}
                <div>
                    <x-input-label for="payment_method" value="Metode Pembayaran" />
                    <select id="payment_method" name="payment_method" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="cash"
                            {{ old('payment_method', $transaction->payment_method) == 'cash' ? 'selected' : '' }}>Cash
                        </option>
                        <option value="credit_card"
                            {{ old('payment_method', $transaction->payment_method) == 'credit_card' ? 'selected' : '' }}>
                            Credit Card</option>
                        <option value="bank_transfer"
                            {{ old('payment_method', $transaction->payment_method) == 'bank_transfer' ? 'selected' : '' }}>
                            Bank Transfer</option>
                    </select>
                    <x-input-error :messages="$errors->get('payment_method')" class="mt-1" />
                </div>

                {{-- Status Transaksi --}}
                <div>
                    <x-input-label for="status" value="Status Transaksi" />
                    <select id="status" name="status" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="pending"
                            {{ old('status', $transaction->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed"
                            {{ old('status', $transaction->status) == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="cancelled"
                            {{ old('status', $transaction->status) == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-1" />
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end col-span-1 sm:col-span-2">
                    <x-primary-button>
                        <i class="fas fa-save mr-2"></i> Update
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
