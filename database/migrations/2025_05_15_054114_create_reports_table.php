<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('report_date')->index(); // Tanggal laporan (harian/bulanan) dengan indeks
            $table->decimal('total_income', 12, 2)->default(0); // Total pemasukan dari transaksi, default 0
            $table->integer('total_transactions')->default(0); // Jumlah transaksi, default 0
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete(); // ID pengguna yang membuat laporan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
