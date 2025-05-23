<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap');

        body {
            font-family: 'Roboto Mono', monospace;
            width: 80mm height: auto;
        }
    </style>
</head>

<body class="mx-auto p-2">
    <!-- Header -->
    <div class="text-center mb-2 border-b border-dashed border-gray-400 pb-2">
        <h1 class="font-bold text-xl uppercase">Buton Carwash</h1>
        <p class="text-xs">Jl. Timur Stasiun Comal</p>
        <p class="text-xs">Telp: (021) 123-4567</p>
    </div>

    <!-- Info Transaksi -->
    <div class="mb-2">
        <div class="flex justify-between">
            <!--Tanggal Transaksi -->
            <div class="font-bold">TANGGAL :</div>
            <div>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y H:i') }}</div>
        </div>

    </div>

    <div class="border-t border-dashed border-gray-400 my-1"></div>

    <!-- Detail Pelanggan -->
    <div class="mb-2">
        <div class="flex justify-between">
            <div class="font-bold">NAMA</div>
            <div>{{ $transaction->customer->name ?? '-' }}</div>
        </div>
    </div>

    <!-- Detail No. Telepon -->
    <div class="mb-2">
        <div class="flex justify-between">
            <div class="font-bold">NO. TELEPON</div>
            <div>{{ $transaction->customer->phone ?? '-' }}</div>
        </div>
    </div>

    <!-- Detail alamat -->
    <div class="mb-2">
        <div class="flex justify-between">
            <div class="font-bold">ALAMAT</div>
            <div>{{ $transaction->customer->address ?? '-' }}</div>
        </div>
    </div>

    <!--Detail Kendaraan -->
    <div class="mb-2">
        <div class="flex justify-between">
            <div class="font-bold">KENDARAAN</div>
            <div>{{ $transaction->customer->vehicle_type ?? '-' }}</div>
        </div>

    </div>


    <!-- Detail Layanan -->
    <div class="mb-2">
        <div class="flex justify-between">
            <div class="font-bold">LAYANAN</div>
            <div>{{ $transaction->service->name ?? '-' }}</div>
        </div>

    </div>

    <div class="border-t border-dashed border-gray-400 my-1"></div>

    <!-- Total Pembayaran -->
    <div class="mb-2">
        <div class="flex justify-between font-bold">
            <span>TOTAL</span>
            <span>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span>Pembayaran:</span>
            <span>{{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span>Status:</span>
            <span class="font-bold">{{ ucfirst($transaction->status) }}</span>
        </div>
    </div>

    <div class="border-t border-dashed border-gray-400 my-1"></div>

    <!-- Barcode -->
    <!-- Barcode -->
    @php
        $barcode = app('Milon\Barcode\DNS1D');
        $publicUrl = url('/public/transactions/' . $transaction->id);
    @endphp
    <div class="text-center mt-4 mb-2">
        {!! $barcode->getBarcodeHTML($transaction->id, 'C39', 1.5, 50) !!}
        <div class="text-xs mt-1">TRX{{ $transaction->id }}</div>
    </div>
    <!-- Footer -->
    <div class="text-center text-xs border-t border-dashed border-gray-400 pt-2">
        <p>Terima kasih atas kunjungan Anda</p>
        <p>Barang yang sudah dibeli tidak dapat dikembalikan</p>
        <p class="mt-1 text-[10px]">=== LAYANAN KAMI ===</p>
        <p class="text-[10px]">1. Cuci Mobil Reguler</p>
        <p class="text-[10px]">2. Cuci Mobil Premium</p>
        <p class="text-[10px]">3. Cuci + Wax</p>

    </div>
    <!-- QR Code untuk direct link -->
    <!-- QR Code untuk direct link -->
    <div class="flex flex-col items-center justify-center mt-4 mb-2">
        <div class="flex justify-center w-full">
            {!! DNS2D::getBarcodeHTML(url("public/transactions/{$transaction->id}"), 'QRCODE', 4, 4) !!}
        </div>
        <div class="text-xs mt-1">Scan untuk melihat detail</div>
    </div>


</body>

</html>
