<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - Buton Carwash</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-6 shadow-lg">
        <div class="container mx-auto">
            <div class="flex items-center justify-center">
                <i class="fas fa-car-wash text-3xl mr-3"></i>
                <h1 class="text-2xl font-bold">BUTON CARWASH</h1>
            </div>
            <p class="text-center text-blue-100 mt-1">Kualitas Terbaik untuk Kendaraan Anda</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 my-6">
        <!-- Status Banner -->
        <div class="rounded-lg shadow-md mb-6 overflow-hidden">
            <div
                class="p-4 {{ $transaction->status == 'completed' ? 'bg-green-500' : ($transaction->status == 'processing' ? 'bg-yellow-500' : 'bg-blue-500') }} text-white">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold">Status Transaksi:</h2>
                    <span class="uppercase text-lg font-bold">{{ $transaction->status }}</span>
                </div>
            </div>

            <!-- Transaction Info -->
            <div class="bg-white p-5 rounded-b-lg">
                <div class="border-b pb-4 mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">ID Transaksi:</span>
                        <span class="font-bold">TRX{{ $transaction->id }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Tanggal:</span>
                        <span>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y, H:i') }}</span>
                    </div>
                </div>

                <!-- Customer Info -->
                <h3 class="text-lg font-semibold mb-3 text-blue-700">
                    <i class="fas fa-user mr-2"></i>Informasi Pelanggan
                </h3>
                <div class="bg-gray-50 p-4 rounded-lg mb-4">
                    <div class="grid md:grid-cols-2 gap-3">
                        <div>
                            <p class="text-gray-600 text-sm">Nama:</p>
                            <p class="font-medium">{{ $transaction->customer->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Telepon:</p>
                            <p class="font-medium">{{ $transaction->customer->phone ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-gray-600 text-sm">Alamat:</p>
                            <p class="font-medium">{{ $transaction->customer->address ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Vehicle & Service Info -->
                <h3 class="text-lg font-semibold mb-3 text-blue-700">
                    <i class="fas fa-car mr-2"></i>Detail Layanan
                </h3>
                <div class="bg-gray-50 p-4 rounded-lg mb-4">
                    <div class="grid md:grid-cols-2 gap-3">
                        <div>
                            <p class="text-gray-600 text-sm">Jenis Kendaraan:</p>
                            <p class="font-medium">{{ $transaction->customer->vehicle_type ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Layanan:</p>
                            <p class="font-medium">{{ $transaction->service->name ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Info -->
                <h3 class="text-lg font-semibold mb-3 text-blue-700">
                    <i class="fas fa-credit-card mr-2"></i>Pembayaran
                </h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-gray-600">Metode Pembayaran:</p>
                        <p class="font-medium">{{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-gray-600">Total:</p>
                        <p class="text-xl font-bold text-blue-700">Rp
                            {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Note -->
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="text-center">
                <p class="text-gray-600">Terima kasih atas kunjungan Anda.</p>
                <p class="text-gray-600">Jika ada pertanyaan, hubungi (021) 123-4567</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h3 class="font-bold text-lg mb-2">BUTON CARWASH</h3>
                <p class="text-gray-300 text-sm">Jl. Timur Stasiun Comal</p>
                <p class="text-gray-300 text-sm">Telp: (021) 123-4567</p>
                <div class="mt-4">
                    <a href="#" class="text-blue-400 hover:text-blue-300 mx-2"><i
                            class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-300 mx-2"><i
                            class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-300 mx-2"><i
                            class="fab fa-whatsapp fa-lg"></i></a>
                </div>
                <p class="mt-4 text-xs text-gray-400">© {{ date('Y') }} Buton Carwash. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
