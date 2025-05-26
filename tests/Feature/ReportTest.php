<?php

use App\Models\Report;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

/**
 * beforeEach hook untuk mengatur Storage fake
 * agar tidak menyimpan file secara nyata selama pengujian.
 */
beforeEach(function () {
    Storage::fake('local');
});
/**
 * Menampilkan Semua Report
 */
test('Berhasil Menampilkan Halaman Report Index', function () {
    $user = createAdminUser();

    Report::factory(3)->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)->get('/dashboard/reports');

    $response->assertStatus(200);
    $response->assertViewIs('dashboard.reports.index');
    $response->assertViewHas('reports');
});

/**
 * Membuat Report Baru
 */
test('Berhasil Menyimpan Report Baru', function () {
    $user = createAdminUser();

    // Buat beberapa transaksi untuk tanggal tertentu
    $reportDate = now()->format('Y-m-d');
    Transaction::factory(3)->create([
        'transaction_date' => $reportDate,
        'total_price' => 50000
    ]);

    $data = [
        'report_date' => $reportDate,
    ];

    $response = $this->actingAs($user)
        ->post('/dashboard/reports', $data);

    $response->assertRedirect('/dashboard/reports');
    $this->assertDatabaseHas('reports', [
        'report_date' => $reportDate,
        'total_income' => 150000, // 3 transaksi * 50000
        'total_transactions' => 3,
        'user_id' => $user->id
    ]);
});
