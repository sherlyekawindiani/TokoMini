<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM products WHERE id = '$id'");

if ($hapus) {
    echo "<script>
            alert('Produk berhasil dihapus!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus produk!');
            window.location.href = 'index.php';
          </script>";
}
?>