<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/public/transactions/{id}', [TransactionController::class, 'publicShow'])->name('transactions.public.show');

Route::get('/dashboard', [
    DashboardController::class,
    'index'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware('role:Admin')->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('services', ServiceController::class);
        });

        Route::resource('customers', CustomerController::class);
        Route::get('/transactions/{transaction}/struk', [TransactionController::class, 'cetakStruk'])->name('transactions.struk');
        Route::resource('transactions', TransactionController::class);
        Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
        Route::resource('reports', ReportController::class);
    });
});

require __DIR__ . '/auth.php';
