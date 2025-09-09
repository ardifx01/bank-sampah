# Aplikasi Web Bank Sampah
Aplikasi ini dibuat untuk memenuhi tugas [Sebutkan Nama Mata Kuliah/Tugas Anda]. Proyek ini mensimulasikan sistem pengelolaan bank sampah digital untuk membantu isu keberlanjutan.

### Deskripsi Masalah & Solusi

* **Masalah:** Masyarakat seringkali kesulitan menemukan lokasi bank sampah terdekat dan tidak memiliki cara mudah untuk melacak nilai ekonomis dari sampah yang mereka setorkan.
* **Solusi:** Aplikasi web ini menyediakan platform terpusat di mana pengguna dapat menemukan lokasi drop point, dan admin dapat mencatat setiap setoran sampah, yang kemudian dikonversikan menjadi sistem poin untuk pengguna.

---

### ## Fitur Utama

* **Manajemen Peran:** Sistem membedakan antara **Admin** dan **Pengguna Biasa** dengan hak akses yang berbeda.
* **Manajemen Drop Point (CRUD):** Admin dapat menambah, melihat, mengedit, dan menghapus data lokasi drop point.
* **Pencatatan Transaksi:** Admin dapat mencatat transaksi setoran sampah untuk setiap pengguna terdaftar.
* **Sistem Poin Otomatis:** Poin dihitung secara otomatis berdasarkan berat sampah dan langsung ditambahkan ke saldo poin pengguna.
* **Dashboard Dinamis:**
    * **Admin:** Melihat statistik ringkas seperti total pengguna, total drop point, dan total transaksi.
    * **Pengguna:** Melihat total poin pribadi yang dimiliki.
* **Riwayat Transaksi:**
    * **Admin:** Melihat riwayat transaksi dari **semua pengguna**.
    * **Pengguna:** Melihat riwayat transaksi **pribadi** dan detail rincian sampah per transaksi.

---

#### Entity-Relationship Diagram (ERD)

```text
+-------------+        +---------------+        +--------------------+
|   users     |----<-- |  collections  |----<-- | collection_details |
+-------------+        +---------------+        +--------------------+
| id (PK)     |        | id (PK)       |        | id (PK)            |
| name        |        | user_id (FK)  |        | collection_id (FK) |
| email       |        | drop_point_id |        | waste_type         |
| password    |        | total_points  |        | weight_in_kg       |
| role        |        +---------------+        | points_per_kg      |
| points_bal. |                                 +--------------------+
+-------------+

+-------------+
| drop_points |
+-------------+
| id (PK)     |
| name        |
| address     |
+-------------+
```
---

### ## Cara Menjalankan Lokal

1.  **Clone repository ini:**
    ```bash
    git clone [LINK_REPOSITORY_ANDA]
    ```
2.  **Masuk ke direktori proyek:**
    ```bash
    cd nama-folder-proyek
    ```
3.  **Install dependensi PHP:**
    ```bash
    composer install
    ```
4.  **Salin file environment:**
    ```bash
    cp .env.example .env
    ```
5.  **Generate key aplikasi:**
    ```bash
    php artisan key:generate
    ```
6.  **Buat database baru** di MySQL (misal: `db_banksampah`).
7.  **Sesuaikan koneksi database** di dalam file `.env`.
8.  **Jalankan migrasi** untuk membuat semua tabel:
    ```bash
    php artisan migrate
    ```
9.  **Install dependensi JavaScript:**
    ```bash
    npm install
    ```
10. **Jalankan Vite development server (biarkan tetap berjalan):**
    ```bash
    npm run dev
    ```
11. **(Di terminal lain) Jalankan server utama Laravel:**
    ```bash
    php artisan serve
    ```
12. Buka `http://1227.0.0.1:8000` di browser Anda.

#### Akun Demo
* **Akun Admin:** Buat akun baru melalui halaman registrasi, lalu ubah `role` pengguna tersebut menjadi `admin` secara manual di database (melalui phpMyAdmin).
* **Akun Pengguna:** Cukup lakukan registrasi melalui halaman registrasi.

---

### ## Tangkapan Layar

**1. Halaman Dashboard Admin**

*(Ganti baris ini dengan gambar dashboard admin Anda)*

**2. Halaman Pencatatan Transaksi oleh Admin**

*(Ganti baris ini dengan gambar halaman pencatatan transaksi Anda)*

**3. Halaman Riwayat Transaksi Pengguna**

*(Ganti baris ini dengan gambar riwayat transaksi pengguna Anda)*

---

### ## Keputusan Teknis

* **Laravel 12:** Dipilih karena merupakan framework PHP yang modern dan kuat dengan ekosistem yang matang. Fitur seperti Eloquent ORM, Blade Templating, dan sistem keamanan bawaan mempercepat pengembangan.
* **MySQL:** Digunakan karena merupakan sistem database relasional yang andal, populer, dan terintegrasi dengan baik bersama Laravel.
* **Bootstrap (SB Admin 2):** Template ini dipilih untuk mempercepat pengembangan antarmuka (UI) yang responsif dan profesional tanpa harus menulis CSS dari nol.

### ## Sumber Data/API

Aplikasi ini tidak menggunakan sumber data eksternal atau API. Semua data dihasilkan oleh interaksi pengguna dan admin di dalam aplikasi.





