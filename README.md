# Sistem Penjualan dan Profil PT Abrisam Bintan Indonesia

Aplikasi web ini adalah sistem informasi profil perusahaan dan penjualan produk untuk PT Abrisam Bintan Indonesia. Dibangun menggunakan framework Laravel, aplikasi ini menyediakan antarmuka publik untuk pelanggan dan dashboard admin yang komprehensif untuk pengelolaan konten, produk, dan inventaris.

## 🚀 Fitur Utama

### 🌐 Halaman Publik (Pelanggan)
*   **Profil Perusahaan**: Halaman Tentang Kami, Struktur Organisasi, dan Kegiatan Perusahaan.
*   **Katalog Produk**: Menampilkan produk, paket, dan promo dengan fitur filter berdasarkan kategori.
*   **Blog & Informasi**: Artikel blog dengan fitur pencarian dan halaman FAQ.
*   **Pemesanan Produk**: Alur pemesanan lengkap dengan verifikasi OTP, input lokasi, dan data diri pelanggan.
*   **Kontak**: Informasi kontak perusahaan.

### 🛠 Dashboard Admin
*   **Manajemen Produk**: Kelola Produk, Kategori, Paket, dan Promo.
*   **Manajemen Konten (CMS)**: Kelola Blog, FAQ, dan informasi Tentang Kami (Struktur Organisasi, Kegiatan).
*   **Manajemen Inventaris**:
    *   Pencatatan barang masuk dan keluar.
    *   Manajemen stok.
    *   Ekspor laporan inventaris ke Excel.
*   **Manajemen Pelanggan**: Lihat data pelanggan dan ekspor ke Excel.
*   **Manajemen Pengguna**: Kelola akun admin.
*   **Autentikasi**: Login aman dan fitur reset password.

## 💻 Teknologi yang Digunakan

*   **Backend**: [Laravel 11](https://laravel.com) (PHP 8.2+)
*   **Frontend**:
    *   [Tailwind CSS](https://tailwindcss.com)
    *   [Flowbite](https://flowbite.com)
    *   Blade Templates
*   **Database**: MySQL
*   **Tools & Library**:
    *   [Vite](https://vitejs.dev) (Asset bundling)
    *   `maatwebsite/excel` (Ekspor Excel)
    *   `intervention/image` (Manipulasi Gambar)
    *   `ckeditor5` (Text Editor)
    *   `orgchart.js` (Visualisasi Struktur Organisasi)
    *   `getbrevo/brevo-php` & `phpmailer` (Layanan Email)

## 📋 Prasyarat Sistem

Sebelum memulai, pastikan sistem Anda memiliki:
*   PHP >= 8.2
*   Composer
*   Node.js & NPM
*   MySQL Database

## ⚙️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1.  **Clone Repositori**
    ```bash
    git clone https://github.com/username/repo-name.git
    cd nama-folder-project
    ```

2.  **Instal Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Instal Dependensi JavaScript**
    ```bash
    npm install
    ```

4.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan sesuaikan konfigurasi database Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Migrasi Database**
    Jalankan migrasi untuk membuat tabel-tabel yang diperlukan:
    ```bash
    php artisan migrate
    ```
    *(Opsional) Jika ada seeder:*
    ```bash
    php artisan db:seed
    ```

7.  **Jalankan Build Assets**
    Untuk pengembangan (hot-reload):
    ```bash
    npm run dev
    ```
    Untuk produksi:
    ```bash
    npm run build
    ```

8.  **Jalankan Server Lokal**
    Buka terminal baru dan jalankan:
    ```bash
    php artisan serve
    ```

Akses aplikasi melalui browser di `http://localhost:8000`.

## 📂 Struktur Folder

*   `app/`: Logika inti aplikasi (Controllers, Models, dll).
*   `resources/views/`: Tampilan antarmuka (Blade templates).
*   `routes/`: Definisi rute URL (web.php).
*   `database/migrations/`: Skema database.
*   `public/`: Aset publik (gambar, file build).

## 🔐 Akun Default (Jika Ada)

Jika Anda telah menjalankan seeder, gunakan akun berikut untuk login ke dashboard admin:
*   **URL**: `/admin/login`
*   **Email**: (Sesuaikan dengan seeder)
*   **Password**: (Sesuaikan dengan seeder)

---
Dibuat dengan ❤️ oleh Tim Pengembang.
