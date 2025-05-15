<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * * Seeder untuk layanan
         * * Seeder ini digunakan untuk mengisi data layanan ke dalam tabel services
         */
        Service::factory(10)->create();
    }
}
