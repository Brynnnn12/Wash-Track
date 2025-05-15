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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("customer_id")->constrained("customers")->cascadeOnDelete()->index();
            $table->foreignUuid("service_id")->constrained("services")->cascadeOnDelete(); // Nullable
            $table->date("transaction_date")->index(); // Nullable
            $table->decimal("total_price", 10, 2); // Nullable
            $table->enum("payment_method", ["cash", "credit_card", "bank_transfer"]); // Nullable
            $table->enum("status", ["pending", "completed", "canceled"])->default("pending"); // Tetap default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
