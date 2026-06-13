<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

$query = "SELECT * FROM categories ORDER BY id DESC";
$tampil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Kategori - Toko Mini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <?php include '../dashboard/navbar.php'; ?>

        <div class="container">
            <div class="mb-4">
                <h2 class="fw-bold" style="color: #0a5a60;"><i class="fa-solid fa-tags me-2"></i>Kelola Kategori Produk</h2>
                <p class="text-muted small">Atur kategori produk toko Anda pada halaman manajemen ini.</p>
            </div>

            <div class="row g-4">
                <?php if ($_SESSION['status'] == 'Admin') : ?>
                <div class="col-md-4">
                    <div class="card card-custom border-0 shadow-sm p-4">
                        <h5 class="fw-bold mb-3 text-dark">Tambah Kategori</h5>
                        <form action="tambah.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control py-2" placeholder="Contoh: Elektronik" required>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-teal-action w-100 py-2 fw-semibold rounded-3">
                                <i class="fa-solid fa-square-plus me-1"></i> Simpan Data
                            </button>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <div class="<?= ($_SESSION['status'] == 'Admin') ? 'col-md-8' : 'col-md-12'; ?>">
                    <div class="card card-custom border-0 shadow-sm p-4">
                        <h5 class="fw-bold mb-3 text-dark">Daftar Kategori</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="text-secondary small fw-bold">
                                        <th width="10%" class="text-center">No</th>
                                        <th>Nama Kategori</th>
                                        <th width="25%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    if (mysqli_num_rows($tampil) > 0) {
                                        while ($row = mysqli_fetch_assoc($tampil)) { ?>
                                            <tr>
                                                <td class="text-center text-secondary fw-semibold"><?= $no++; ?></td>
                                                <td class="fw-medium text-dark"><?= $row['nama_kategori']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($_SESSION['status'] == 'Admin') : ?>
                                                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm fw-medium text-white me-1 px-3 rounded-2">
                                                            <i class="fa-solid fa-marker me-1"></i>Edit
                                                        </a>
                                                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm fw-medium px-3 rounded-2" onclick="return confirm('Yakin ingin menghapus?')">
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
                                            <td colspan="3" class="text-center text-muted py-4">Belum ada data kategori.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>