<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Perintah hapus
$hapus = mysqli_query($koneksi, "DELETE FROM categories WHERE id = '$id'");

if ($hapus) {
    echo "<script>
            alert('Kategori berhasil dihapus!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus kategori!');
            window.location.href = 'index.php';
          </script>";
}
?>