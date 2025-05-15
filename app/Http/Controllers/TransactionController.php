<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Service;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Tampilkan daftar transaksi.
     */
    public function index()
    {
        $transactions = Transaction::with(['customer', 'service'])->paginate(10);
        return view('dashboard.transactions.index', compact('transactions'));
    }

    /**
     * Tampilkan form buat transaksi baru.
     */
    public function create()
    {
        $services = Service::select('id', 'name', 'price')->get(); // Ambil hanya kolom yang diperlukan
        $customers = Customer::select('id', 'name', 'phone')->get(); // Ambil hanya kolom yang diperlukan


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
     * Tampilkan form edit transaksi.
     */
    public function edit(Transaction $transaction)
    {
        $customers = Customer::select('id', 'name')->get(); // Ambil hanya kolom yang diperlukan

        $services = Service::all();
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
}
