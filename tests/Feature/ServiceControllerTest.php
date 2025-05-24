<?php

use App\Models\User;
use Spatie\Permission\Models\Role;




/**
 * test halaman services ammbil data
 */
test('Berhasil Ambil Semua Service', function () {
    $user = createAdminUser(); // Menggunakan fungsi pembantu untuk membuat user dengan role Admin

    $response = $this->actingAs($user)->get('/dashboard/services');

    $response->assertStatus(200);
    $response->assertViewIs('dashboard.services.index');
    $response->assertViewHas('services');
});

/**
 * test halaman services create
 */
test('Berhasil Menampilkan Halaman Create Service', function () {
    $user = createAdminUser(); // Menggunakan fungsi pembantu untuk membuat user dengan role Admin

    $response = $this->actingAs($user)->get('/dashboard/services/create');

    $response->assertStatus(200);
    $response->assertViewIs('dashboard.services.create');
});
/**
 * test halaman services store
 */
test('Berhasil Menyimpan Service Baru', function () {
    $user = createAdminUser(); // Menggunakan fungsi pembantu untuk membuat user dengan role Admin

    $data = [
        'name' => 'Test Service',
        'price' => 10000,
    ];

    $response = $this->actingAs($user)->post('/dashboard/services', $data);

    $response->assertRedirect('/dashboard/services');
    $this->assertDatabaseHas('services', ['name' => 'Test Service']);
    $this->assertDatabaseHas('services', ['price' => 10000]);
});

/**
 * test halaman services edit
 */
test('Berhasil Menampilkan Halaman Edit Service', function () {
    $user = createAdminUser(); // Menggunakan fungsi pembantu untuk membuat user dengan role Admin

    $service = \App\Models\Service::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard/services/' . $service->id . '/edit');

    $response->assertStatus(200);
    $response->assertViewIs('dashboard.services.edit');
    $response->assertViewHas('service', $service);
});
/**
 * test halaman services update
 */
test('Berhasil Memperbarui Service', function () {
    $user = createAdminUser(); // Menggunakan fungsi pembantu untuk membuat user dengan role Admin

    $service = \App\Models\Service::factory()->create();

    $data = [
        'name' => 'Updated Service',
        'price' => 20000,
    ];

    $response = $this->actingAs($user)->put('/dashboard/services/' . $service->id, $data);

    $response->assertRedirect('/dashboard/services');
    $this->assertDatabaseHas('services', ['name' => 'Updated Service']);
    $this->assertDatabaseHas('services', ['price' => 20000]);
});
/**
 * test halaman services delete
 */
test('Berhasil Menghapus Service', function () {
    $user = createAdminUser(); // Menggunakan fungsi pembantu untuk membuat user dengan role Admin

    $service = \App\Models\Service::factory()->create();

    $response = $this->actingAs($user)->delete('/dashboard/services/' . $service->id);

    $response->assertRedirect('/dashboard/services');
    $this->assertDatabaseMissing('services', ['id' => $service->id]);
    $this->assertDatabaseMissing('services', ['name' => $service->name]);
    $this->assertDatabaseMissing('services', ['price' => $service->price]);
});
