# Laravel Job Tracker

Aplikasi **Laravel Job Tracker** ini membantu kamu untuk mencatat dan memantau semua lamaran kerja, termasuk status, platform, dan dokumen terkait. Dibangun menggunakan Laravel 10 dan Breeze.

---

## Fitur Utama

- **Dashboard Lamaran**: Lihat semua lamaran yang sudah dikirim, termasuk statistik per status dan per platform.
- **Tambah Lamaran Baru**: Form untuk menambahkan lamaran dengan data posisi, platform, tanggal, dokumen, status, dan keterangan.
- **Edit Lamaran**: Memperbarui informasi lamaran yang sudah ada.
- **Hapus Lamaran**: Menghapus lamaran yang sudah tidak relevan.
- **Statistik**: Ringkasan total lamaran, lamaran wawancara, diterima, ditolak, dan statistik per platform.
- **Autentikasi & Profil**: Login, register, dan edit profil pengguna (dilengkapi email verification).

---

## Screenshot

**Dashboard Lamaran**
![Dashboard](screenshots/dashboard.png)

**Form Edit Lamaran**
![Edit Lamaran](screenshots/edit-lamaran.png)

> Ganti file `screenshots/dashboard.png` dan `screenshots/edit-lamaran.png` dengan screenshot asli sebelum upload ke GitHub.

---

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di lokal:

1. **Clone repository**
```bash
git clone https://github.com/winduputra/laravel-job-tracker.git
cd laravel-job-tracker
```
2. **Install dependencies**
```bash
composer install
npm install
npm run dev
```
4. Copy file environment
```bash
cp .env.example .env
```
5. Generate app key
```bash
php artisan key:generate
```
6. Konfigurasi database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```
7. Jalankan migrasi
```bash
php artisan migrate
```
8. Jalankan server lokal
```bash
php artisan migrate
http://127.0.0.1:8000
```
