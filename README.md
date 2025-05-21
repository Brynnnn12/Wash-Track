# WashTrack - Sistem Manajemen Usaha Cuci Kendaraan

![WashTrack Logo](public/images/logo.png)

## Tentang WashTrack

WashTrack adalah sistem manajemen berbasis web yang dirancang khusus untuk usaha cuci kendaraan. Aplikasi ini membantu pemilik usaha dan staf untuk mengelola layanan, pelanggan, dan transaksi dengan mudah dan efisien.

## Fitur Utama

-   **Manajemen Layanan**: Tambah, edit, dan hapus berbagai jenis layanan cuci kendaraan beserta harga
-   **Manajemen Pelanggan**: Kelola data pelanggan
-   **Pencatatan Transaksi**: Catat semua transaksi dengan cepat dan akurat
-   **Cetak Struk**: Cetak struk transaksi langsung ke printer thermal
-   **Dashboard Analitik**: Pantau kinerja bisnis dengan grafik dan statistik
-   **Manajemen Pengguna**: Atur peran dan izin untuk kasir
-   **Responsif**: Tampilan yang responsif untuk berbagai ukuran perangkat

## Teknologi yang Digunakan

-   **Backend**: PHP 8.2, Laravel 12
-   **Frontend**: Blade, TailwindCSS, AlpineJS
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze
-   **PDF Generation**: Spatie Laravel PDF
-   **Role**:Spatie Permission

## Persyaratan Sistem

-   PHP 8.2 atau lebih baru
-   Composer
-   MySQL atau MariaDB
-   Node.js & NPM
-   Laragon & Xampp

## Instalasi

1. Clone repositori:
   ```bash
   git clone https://github.com/Brynnnn12/Wash-Track.git
   cd Wash-Track
   ```

2. Instal dependensi PHP:
   ```bash
   composer install
   ```

3. Instal dependensi NPM:
   ```bash
   npm install
   ```

4. Salin file lingkungan contoh dan generate kunci aplikasi:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Konfigurasi database di file `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_washtrack
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Jalankan migrasi database dan seed data awal:
   ```bash
   php artisan migrate --seed
   ```

7. Build asset:
   ```bash
   npm run build
   ```

8. Jalankan server pengembangan:
   ```bash
   composer run dev
   ```

9. Kunjungi `http://localhost:8000` di browser Anda.

## Kredensial Default

Setelah melakukan seeding database, Anda dapat login dengan kredensial default berikut:

- **Admin**
  - Email: admin@gmail.com
  - Password: admin123

- **User**
  - Email: staff@example.com
  - Password: password

## Peran Pengguna

Sistem ini menyertakan 2 peran yang telah ditentukan dengan izin yang berbeda:

- **Admin**: Akses penuh ke semua fitur
- **User**: Akses terbatas untuk melihat Mengelola Transaksi dan Laporan



