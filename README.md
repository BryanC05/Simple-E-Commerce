````markdown
# Insyst Test - Fullstack Developer Intern (Laravel)

Repository ini berisi penyelesaian tugas tes coding untuk posisi **Back-End** dan **Front-End** Developer Intern di Insyst. Proyek ini dibangun menggunakan Framework Laravel dengan implementasi RESTful API dan tampilan antarmuka (Blade View).

## 📋 Fitur Utama

### [cite_start]1. Back-End (RESTful API) [cite: 42, 53]
* **Manajemen Produk (CRUD):**
    * Melihat daftar produk.
    * Menambah produk baru.
    * Update data produk.
    * [cite_start]Hapus produk (Soft Deletes)[cite: 47].
* **Manajemen Transaksi:**
    * Mencatat pembelian produk.
    * [cite_start]**Validasi Stok:** Transaksi ditolak jika stok kurang[cite: 63].
    * [cite_start]**Otomatisasi:** Stok berkurang otomatis & Total harga terhitung otomatis saat transaksi sukses[cite: 63].

### [cite_start]2. Front-End (Web View) [cite: 4]
* Halaman daftar produk menggunakan **Bootstrap 5**.
* [cite_start]Integrasi **DataTables** untuk fitur search & pagination[cite: 11].
* [cite_start]**Modal Form** untuk menambah produk (UI Interaction)[cite: 13].

---

## 🛠️ Teknologi yang Digunakan

* **Framework:** Laravel 10
* **Bahasa:** PHP 8.1+
* **Database:** SQLite (untuk kemudahan testing tanpa konfigurasi server database berat)
* **Frontend:** Bootstrap 5, jQuery, DataTables CDN
* **Tools:** Postman (API Testing), VS Code

---

## 🚀 Cara Instalasi & Menjalankan

Ikuti langkah-langkah ini untuk menjalankan proyek di komputer lokal Anda:

### 1. Clone Repository / Extract Folder
Pastikan Anda sudah berada di dalam folder proyek melalui terminal.

### 2. Install Dependencies
```bash
composer install
````

### 3\. Konfigurasi Environment & Database

Proyek ini dikonfigurasi menggunakan **SQLite**.

  * Salin file `.env.example` menjadi `.env`.
  * Pastikan konfigurasi database di `.env` seperti ini:

<!-- end list -->

```env
DB_CONNECTION=sqlite
DB_DATABASE_SQLITE="${PWD}/database/database.sqlite"
# DB_HOST, DB_PORT, dst boleh dikosongkan/hapus
```

  * Buat file database kosong (jika belum ada):

<!-- end list -->

```bash
touch database/database.sqlite
```

### 4\. Jalankan Migrasi

Untuk membuat tabel `products` dan `transactions` serta mereset data:

```bash
php artisan migrate:fresh
```

### 5\. Jalankan Server

```bash
php artisan serve
```

Akses proyek di: `http://127.0.0.1:8000`

-----

## 📖 Dokumentasi API (Back-End)

Gunakan Postman untuk menguji endpoint berikut:

### 1\. Produk

  * **GET** `/api/products` - Ambil semua data.
  * **POST** `/api/products` - Tambah data.
      * *Body (JSON):*
        ```json
        {
            "name": "Laptop Gaming",
            "price": 15000000,
            "stock": 10
        }
        ```
  * **PUT** `/api/products/{id}` - Edit data.
  * **DELETE** `/api/products/{id}` - Hapus data (Soft delete).

### 2\. Transaksi

  * **POST** `/api/transactions`
      * *Body (JSON):*
        ```json
        {
            "product_id": 1,
            "quantity": 2
        }
        ```
      * [cite\_start]*Catatan:* Stok akan otomatis berkurang dan `total_price` akan dihitung oleh sistem[cite: 55, 63].

-----

## 🖥️ Akses Halaman Web (Front-End)

Untuk melihat implementasi tampilan (UI):

1.  Pastikan server berjalan (`php artisan serve`).
2.  Buka browser dan kunjungi URL:
    > **https://www.google.com/search?q=http://127.0.0.1:8000/products-view**

### Fitur Halaman Web:

  * [cite\_start]**Tabel:** Menampilkan data produk real-time dari database[cite: 5].
  * [cite\_start]**DataTables:** Coba fitur "Search" di pojok kanan atas tabel[cite: 11].
  * [cite\_start]**Tambah Produk:** Klik tombol **"+ Tambah Produk"** untuk memunculkan Modal Bootstrap[cite: 12, 13].

-----

## 👤 Author
Bryan Chan
Diselesaikan sebagai bagian dari Tes Masuk Insyst.
