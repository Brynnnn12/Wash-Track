{{-- filepath: resources/views/dashboard/reports/pdf.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Laporan Carwash</h2>
    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2 text-left text-xs font-semibold text-gray-700">No</th>
                <th class="border px-4 py-2 text-left text-xs font-semibold text-gray-700">Tanggal Laporan</th>
                <th class="border px-4 py-2 text-left text-xs font-semibold text-gray-700">Total Pendapatan</th>
                <th class="border px-4 py-2 text-left text-xs font-semibold text-gray-700">Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $i => $report)
                <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                    <td class="border px-4 py-2 text-sm text-gray-700">{{ $i + 1 }}</td>
                    <td class="border px-4 py-2 text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($report->report_date)->format('d M Y') }}
                    </td>
                    <td class="border px-4 py-2 text-sm text-gray-700">
                        Rp {{ number_format($report->total_income, 0, ',', '.') }}
                    </td>
                    <td class="border px-4 py-2 text-sm text-gray-700">
                        {{ $report->total_transactions }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
