# 🍱 Marketplace Katering (Catering & Corporate Lunch Platform)

Marketplace Katering adalah aplikasi berbasis web yang dibangun menggunakan **PHP Laravel**. Platform ini dirancang untuk menjembatani kerja sama b2b antara perusahaan katering makanan (Merchant) dengan pihak kantor/perusahaan (Customer) yang membutuhkan penyediaan makan siang karyawan secara terstruktur.

Proyek ini dibangun secara mandiri dari awal sebagai bagian dari **Tes Kemampuan Bidang (Coding Test) Web Developer di PT. Transindo Data Perkasa**.

---

## 🔐 Akun Demo Login (Testing)

Untuk mempermudah proses peninjauan dan pengujian aplikasi oleh Tim HRD / Penguji, silakan gunakan kredensial demo berikut:

### 1. Portal Katering (Merchant)
*   **Email:** `merchant@katering.test`
*   **Password:** `password`

### 2. Portal Kantor (Customer)
*   **Email:** `customer@katering.test`
*   **Password:** `password`

---

## 🚀 Fitur Utama

### 1. Portal Katering (Merchant)
*   **Registrasi & Autentikasi:** Fitur pendaftaran dan masuk log aman untuk pemilik usaha katering.
*   **Pengelolaan Profil:** Pengaturan informasi bisnis (Nama Vendor, Alamat Lengkap, Kontak Operasional, dan Deskripsi Layanan).
*   **Manajemen Menu (CRUD Murni):** Menambah, melihat, memperbarui, dan menghapus menu makanan lengkap dengan Deskripsi, Unggah Foto, dan Harga.
*   **Daftar Pesanan & Invoice:** Memantau daftar pesanan masuk dari kantor mitra serta melacak status *invoice* penagihan secara *real-time*.

### 2. Portal Kantor (Customer)
*   **Registrasi & Autentikasi:** Fitur pendaftaran akun khusus perwakilan kantor/perusahaan.
*   **Pencarian & Filtrasi Katering:** Menemukan vendor katering berdasarkan kriteria lokasi terdekat dan jenis menu makanan.
*   **Sistem Pembelian (Order):** Melakukan pemesanan makanan dengan menentukan varian menu, jumlah porsi, serta tanggal pengiriman yang dijadwalkan.
*   **Riwayat Invoice:** Akses digital langsung untuk mengunduh dan melihat rangkuman *invoice* transaksi yang sah.

---

## 🛠️ Tech Stack & Arsitektur

*   **Framework Utama:** Laravel (PHP)
*   **Basis Data:** MySQL (File SQL terlampir pada root folder proyek)
*   **Antarmuka UI:** HTML, CSS, JavaScript, & Bootstrap (Intuitif & Responsif)
*   **Aturan Kepatuhan Kode:** 100% ditulis manual tanpa bantuan *builder/library* otomatis seperti Filament atau generator CRUD eksternal demi menjaga orisinalitas logika pemrograman.

---

## 📦 Cara Instalasi & Menjalankan Proyek

1. **Clone Repositori**
   ```bash
   git clone https://github.com
   cd marketplace-katering
   ```

2. **Instalasi Dependensi Composer**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment (.env)**
   * Salin file `.env.example` menjadi `.env`
   * Sesuaikan konfigurasi basis data `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan server lokal Anda.

4. **Import Database**
   * Buat database baru di MySQL dengan nama `marketplace_katering` (atau sesuaikan dengan `.env`).
   * Import file SQL yang terletak di root direktori proyek ini ke dalam database Anda.

5. **Generate Application Key & Jalankan Aplikasi**
   ```bash
   php artisan key:generate
   php artisan serve
   ```
   * Buka browser dan akses `http://127.0.0.1:8000`

---
*Aplikasi ini dikembangkan dengan penuh integritas dan siap untuk dipresentasikan serta dipertanggungjawabkan pada sesi wawancara teknis selanjutnya.*
