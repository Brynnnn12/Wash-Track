<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menggunakan query builder untuk operasi perhitungan
        $today = now()->format('Y-m-d');
        // Mengambil data transaksi terbaru dengan eager loading untuk hari ini
        $transactions = Transaction::with('customer', 'service')->whereDate('created_at', $today)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();



        // Menghitung jumlah transaksi dengan status pending hari ini yang belum dibayar
        $pendingTransactions = Transaction::whereDate('created_at', $today)
            ->where('status', 'pending')
            ->count();


        // Menghitung jumlah transaksi hari ini yang sudah bayar
        $todayTransactions = Transaction::whereDate('created_at', $today)
            ->where('status', 'completed')
            ->count();

        // Menggunakan whereHas untuk menghitung jumlah customer yang memiliki transaksi dengan status completed hari ini

        $totalCustomers = Customer::whereHas('transactions', function ($query) use ($today) {
            $query->whereDate('created_at', $today)
                ->where('status', 'completed');
        })->count();
        // Menghitung jumlah pemasukan hari ini
        $todayIncome = Transaction::whereDate('created_at', $today)
            ->where('status', 'completed')
            ->sum('total_price');

        // Mengirim semua data yang dihitung ke view
        return view('dashboard', compact(
            'transactions',
            'pendingTransactions',
            'todayTransactions',
            'totalCustomers',
            'todayIncome'
        ));
    }
}
