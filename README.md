# Toko Mini - Sistem Informasi Manajemen Inventaris

Aplikasi berbasis web (PHP Native & Bootstrap 5) yang dirancang untuk mengelola data inventaris  produk dan kategori barang secara dinamis. Proyek ini mengimplementasikan operasi CRUD (Create, Read, Update, Delete) yang aman, sistem autentikasi, serta fitur kustomisasi tampilan tema.

---
##  Identitas Pengembang
*   **Nama:** Sherly Eka Windiani  
*   **Program Studi:** PJJ Informatika  
*   **Instansi:** Universitas Siber Asia (UNSIA)
  
## Studi Kasus
**Sistem Informasi Manajemen Inventaris dan Kelola Data Produk Berbasis Web pada Toko Mini.**
Fokus utama studi kasus ini adalah menyelesaikan permasalahan pencatatan stok barang, pengelompokan komoditas berdasarkan kategori, pembatasan hak akses berbasis operator, serta penyediaan antarmuka (*user interface*) yang adaptif terhadap kenyamanan visual pengguna.

---

## Fitur Utama

*   **Sistem Autentikasi Keamanan:** Fitur Login dan Register yang aman dengan enkripsi password menggunakan `password_hash()`.
*   **Hak Akses Multi-Status:** Pembatasan halaman berdasarkan status user (contoh: Akses Admin).
*   **Manajemen Kategori (CRUD):** Tambah, lihat, ubah, dan hapus kategori produk dengan tata letak form presisi di tengah.
*   **Manajemen Produk (CRUD):** Pengelolaan data komoditas produk yang terelasi langsung dengan tabel kategori.
*   **Dashboard Statistik Interaktif:** Memuat banner selamat datang yang dinamis serta ringkasan total data yang dilengkapi tombol pintasan *Lihat Detail*.
*   **Kustom Dark / Light Mode:** Transisi tema cerdas menggunakan CSS Variables dan JavaScript LocalStorage yang menjaga ingatan tema agar tidak kembali *reset* saat berpindah halaman.
*   **Desain Selaras & Modern:** Antarmuka premium menggunakan font *Inter*, icon *Font Awesome*, serta palet warna estetis (*Deep Teal* & *Muted Yellow*).

---

## Teknologi yang Digunakan

*   **Bahasa Pemrograman:** PHP (Native)
*   **Database:** MySQL / PostgreSQL
*   **Desain & Layout:** Bootstrap 5.3 & Custom CSS Flexbox
*   **Kumpulan Icon:** Font Awesome v6.4.0
*   **Font:** Inter (Google Fonts)
*   **Scripting:** JavaScript (kustomisasi DOM & LocalStorage untuk Tema)

---

## Cara Instalasi & Menjalankan Proyek

1.  **Clone atau Download Proyek:**
    Ekstrak folder proyek ini ke dalam direktori server lokal Anda (misal: `C:\xampp\htdocs\toko-mini`).
2.  **Impor Database:**
    *   Buka `phpMyAdmin` atau *tools* manajemen database Anda.
    *   Buat database baru (misal bernama `toko_mini`).
    *   Impor file `.sql` yang tersedia di dalam folder proyek ini.
3.  **Konfigurasi Koneksi:**
    Sesuaikan setingan *username*, *password*, dan nama database Anda pada file `config/koneksi.php`.
4.  **Jalankan Aplikasi:**
    Buka browser kesayangan Anda dan akses URL: `http://localhost/toko-mini/auth/login.php`.

---

