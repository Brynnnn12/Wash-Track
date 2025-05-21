<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Transaction;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\LaravelPdf\Enums\Orientation;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Tampilkan daftar transaksi.
     */
    public function index()
    {
        $transactions = Transaction::with(['customer', 'service'])
            ->orderBy('transaction_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.transactions.index', compact('transactions'));
    }
    /**
     * Tampilkan form buat transaksi baru.
     */
    public function create()
    {
        $services = Service::select('id', 'name', 'price')->get(); // Ambil hanya kolom yang diperlukan
        $customers = Customer::select('id', 'name', 'vehicle_plate')->get(); // Ambil hanya kolom yang diperlukan


        return view('dashboard.transactions.create', compact('customers', 'services'));
    }

    /**
     * Simpan transaksi baru.
     */
    public function store(StoreTransactionRequest $request)
    {
        Transaction::create($request->validated());

        return redirect()->route('dashboard.transactions.index')
            ->with('success', 'Transaksi berhasil dibuat.');
    }

    /**
     * Tampilkan detail transaksi.
     */
    public function show(Transaction $transaction)
    {
        // return view('dashboard.transactions.show', compact('transaction'));
    }
    /**
     * Tampilkan form untuk mencetak struk transaksi.
     */
    public function cetakStruk(Transaction $transaction)
    {
        // Format tanggal untuk nama file
        $date = \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d');

        // Buat nama file yang aman (tanpa spasi dan karakter khusus)
        $customerName = str_replace([' ', '/', '\\', '.', ','], '-', $transaction->customer->name);
        $fileName = "Struk-{$customerName}-{$date}.pdf";

        return Pdf::view('dashboard.transactions.struk', [
            'transaction' => $transaction,
            'customer' => $transaction->customer,
            'service' => $transaction->service,
        ])
            ->papersize(80, 150, 'mm') // Lebar 80mm, tinggi auto
            ->orientation(Orientation::Portrait)
            ->margins(2, 2, 2, 2, 'mm') // Margin kecil 2mm
            ->download($fileName); // Nama file yang dinamis
    }
    /**
     * Tampilkan detail transaksinya.
     */
    public function publicShow($id)
    {
        $transaction = Transaction::with(['customer', 'service'])->findOrFail($id);
        return view('public.show', compact('transaction'));
    }
    /**
     * Tampilkan form edit transaksi.
     */
    public function edit(Transaction $transaction)
    {
        $customers = Customer::select('id', 'name', 'vehicle_plate')->get(); // Ambil hanya kolom yang diperlukan

        $services = Service::select('id', 'name', 'price')->get(); // Ambil hanya kolom yang diperlukan
        return view('dashboard.transactions.edit', compact('transaction', 'customers', 'services'));
    }

    /**
     * Update transaksi.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $data = $request->validated();

        // Ambil harga dari service_id
        $service = Service::findOrFail($data['service_id']);
        $data['total_price'] = $service->price;

        // dd($data);

        $transaction->update($data);

        return redirect()->route('dashboard.transactions.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }


    /**
     * Hapus transaksi.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('dashboard.transactions.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
    /**
     * update status transaksi
     */
}
