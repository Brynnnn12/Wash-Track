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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name", 60)->nullable()->index();
            $table->string("phone", 15)->nullable();
            $table->string("address", 100)->nullable();
            $table->string("vehicle_type", 40);
            $table->string("vehicle_plate", 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
