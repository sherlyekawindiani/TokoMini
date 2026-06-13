<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

$query = "SELECT products.*, categories.nama_kategori 
          FROM products 
          JOIN categories ON products.kategori_id = categories.id 
          ORDER BY products.id DESC";
$tampil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Produk - Toko Mini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* --- Tombol Kategori Adaptif --- */
            .btn-kategori-custom {
                background-color: #f1f5f9; 
                color: #0a5a60;            
                border: 1px solid #e2e8f0;
            }

            /* Otomatis berubah saat Dark Mode aktif */
            [data-bs-theme="dark"] .btn-kategori-custom {
                background-color: #0a5a60; 
                color: #f9d06b;            
                border: 1px solid #074347;
            }
        </style>
    </head>
    <body>
        <?php include '../dashboard/navbar.php'; ?>

        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold" style="color: #0a5a60;"><i class="fa-solid fa-boxes-stacked me-2"></i>Kelola Data Produk</h2>
                    <p class="text-muted small mb-0">Daftar inventaris barang dagangan dari sistem Toko Mini Anda.</p>
                </div>
                <?php if ($_SESSION['status'] == 'Admin') : ?>
                    <a href="tambah.php" class="btn btn-teal-action fw-semibold py-2 px-3 rounded-3">
                        <i class="fa-solid fa-folder-plus me-1"></i> Tambah Baru
                    </a>
                <?php endif; ?>
            </div>

            <div class="card card-custom border-0 shadow-sm p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-secondary small fw-bold">
                                <th width="8%" class="text-center">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Jual</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            if (mysqli_num_rows($tampil) > 0) {
                                while ($row = mysqli_fetch_assoc($tampil)) { ?>
                                    <tr>
                                        <td class="text-center text-secondary fw-semibold"><?= $no++; ?></td>
                                        <td class="fw-medium text-dark"><?= $row['nama_produk']; ?></td>
                                       
                                        <td>
                                            <span class="btn btn-sm btn-kategori-custom px-2 py-1 rounded-2 fw-semibold" style="font-size: 0.8rem;">
                                                <?= $row['nama_kategori']; ?>
                                            </span>
                                        </td>


                                        <td class="fw-bold text-dark">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <?php if ($_SESSION['status'] == 'Admin') : ?>
                                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm fw-medium text-white me-1 px-3 rounded-2">
                                                    <i class="fa-solid fa-marker me-1"></i>Edit
                                                </a>
                                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm fw-medium px-3 rounded-2" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                    <i class="fa-solid fa-trash-can me-1"></i>Hapus
                                                </a>
                                            <?php else : ?>
                                                <span class="text-muted small"><i class="fa-solid fa-user-lock me-1"></i> Terkunci</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php } 
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada data produk. Silahkan tambah produk baru.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>