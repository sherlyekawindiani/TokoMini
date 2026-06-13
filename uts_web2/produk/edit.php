<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login']) || $_SESSION['status'] != 'Admin') {
    header("Location: ../auth/login.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$produk_query = mysqli_query($koneksi, "SELECT * FROM products WHERE id='$id'");
$data = mysqli_fetch_assoc($produk_query);

if (!$data) {
    header("Location: index.php");
    exit;
}

$kategori_query = mysqli_query($koneksi, "SELECT * FROM categories ORDER BY nama_kategori ASC");

if (isset($_POST['ubah'])) {
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $kategori_id = mysqli_real_escape_string($koneksi, $_POST['kategori_id']);
    $harga       = mysqli_real_escape_string($koneksi, $_POST['harga']);

    $query = "UPDATE products SET nama_produk='$nama_produk', kategori_id='$kategori_id', harga='$harga' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Produk - Toko Mini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <?php include '../dashboard/navbar.php'; ?>

        <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 70vh;">
            
            <div class="w-100 text-center mb-4" style="max-width: 500px;">
                <h2 class="fw-bold" style="color: #0a5a60;"><i class="fa-solid fa-marker me-2"></i>Edit Data Produk</h2>
                <p class="text-muted small">Perbarui data inventaris komoditas produk Anda dengan benar.</p>
            </div>

            <div class="card card-custom border-0 shadow-sm p-4 w-100" style="max-width: 500px;">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Nama Produk</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted small"><i class="fa-solid fa-box"></i></span>
                            <input type="text" name="nama_produk" class="form-control" value="<?= $data['nama_produk']; ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Kategori Produk</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted small"><i class="fa-solid fa-tags"></i></span>
                            <select name="kategori_id" class="form-select" required>
                                <?php while ($kat = mysqli_fetch_assoc($kategori_query)) : ?>
                                    <option value="<?= $kat['id']; ?>" <?= ($kat['id'] == $data['kategori_id']) ? 'selected' : ''; ?>>
                                        <?= $kat['nama_kategori']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">Harga Jual (Rupiah)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light fw-bold text-secondary small">Rp</span>
                            <input type="number" name="harga" class="form-control" value="<?= $data['harga']; ?>" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" name="ubah" class="btn btn-teal-action px-4 py-2 fw-semibold rounded-3 flex-fill">
                            <i class="fa-solid fa-pen-to-square me-1"></i> Perbarui Data
                        </button>
                        <a href="index.php" class="btn btn-outline-secondary px-4 py-2 fw-semibold rounded-3">
                            <i class="fa-solid fa-xmark me-1"></i> Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>