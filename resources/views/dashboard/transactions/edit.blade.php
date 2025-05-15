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

            <div class="space-y-6 max-w-6xl" x-data="{
                services: {{ Js::from($services->map(fn($s) => ['id' => $s->id, 'price' => $s->price])) }},
                selectedServiceId: '{{ old('service_id', $transaction->service_id) }}',
                get selectedPrice() {
                    const found = this.services.find(s => s.id == this.selectedServiceId);
                    return found ? found.price : '';
                }
            }">
                {{-- Select Customer --}}
                <div>
                    <x-input-label for="customer_id" value="Pelanggan" />
                    <select id="customer_id" name="customer_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="" disabled>Pilih Pelanggan</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $transaction->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }} - {{ $customer->phone }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('customer_id')" class="mt-1" />
                </div>
                {{-- Service --}}
                <div>
                    <x-input-label for="service_id" value="Layanan" />
                    <select id="service_id" name="service_id" x-model="selectedServiceId" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="" disabled>Pilih Layanan</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('service_id')" class="mt-1" />
                </div>

                {{-- Tanggal --}}
                <div>
                    <x-input-label for="transaction_date" value="Tanggal Transaksi" />
                    <x-text-input id="transaction_date" name="transaction_date" type="date"
                        value="{{ old('transaction_date', $transaction->transaction_date) }}" required />
                    <x-input-error :messages="$errors->get('transaction_date')" class="mt-1" />
                </div>

                {{-- Total Harga --}}
                {{-- Total Harga --}}
                <div>
                    <x-input-label for="total_price" value="Total Pembayaran" />
                    <x-text-input id="total_price" name="total_price_display" x-model="selectedPrice"
                        class="bg-gray-100 cursor-not-allowed" disabled />
                    <input type="hidden" id="total_price_hidden" name="total_price" x-model="selectedPrice" />
                    <x-input-error :messages="$errors->get('total_price')" class="mt-1" />
                </div>

                {{-- Status --}}
                <div>
                    <x-input-label for="status" value="Status" />
                    <select id="status" name="status" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="canceled" {{ $transaction->status == 'canceled' ? 'selected' : '' }}>Canceled
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-1" />
                </div>

                {{-- Metode Pembayaran --}}
                <div>
                    <x-input-label for="payment_method" value="Metode Pembayaran" />
                    <select id="payment_method" name="payment_method" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="cash" {{ $transaction->payment_method == 'cash' ? 'selected' : '' }}>Cash
                        </option>
                        <option value="credit_card"
                            {{ $transaction->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                        <option value="bank_transfer"
                            {{ $transaction->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('payment_method')" class="mt-1" />
                </div>

                {{-- Tombol --}}
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
