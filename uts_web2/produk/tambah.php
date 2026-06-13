<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login']) || $_SESSION['status'] != 'Admin') {
    header("Location: ../auth/login.php");
    exit;
}

$kategori_query = mysqli_query($koneksi, "SELECT * FROM categories ORDER BY nama_kategori ASC");

if (isset($_POST['simpan'])) {
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $kategori_id = mysqli_real_escape_string($koneksi, $_POST['kategori_id']);
    $harga       = mysqli_real_escape_string($koneksi, $_POST['harga']);

    $query = "INSERT INTO products (nama_produk, kategori_id, harga) VALUES ('$nama_produk', '$kategori_id', '$harga')";
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
        <title>Tambah Produk - Toko Mini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <?php include '../dashboard/navbar.php'; ?>

        <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 70vh;">
            
            <div class="w-100 text-center mb-4" style="max-width: 500px;">
                <h2 class="fw-bold" style="color: #0a5a60;"><i class="fa-solid fa-folder-plus me-2"></i>Tambah Produk Baru</h2>
                <p class="text-muted small">Inputkan produk baru Anda ke dalam sistem inventaris.</p>
            </div>

            <div class="card card-custom border-0 shadow-sm p-4 w-100" style="max-width: 500px;">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Nama Produk</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted small"><i class="fa-solid fa-box"></i></span>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Sari Roti" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Kategori Produk</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted small"><i class="fa-solid fa-tags"></i></span>
                            <select name="kategori_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php while ($kat = mysqli_fetch_assoc($kategori_query)) : ?>
                                    <option value="<?= $kat['id']; ?>"><?= $kat['nama_kategori']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">Harga Jual (Rupiah)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light fw-bold text-secondary small">Rp</span>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 50000" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" name="simpan" class="btn btn-teal-action px-4 py-2 fw-semibold rounded-3 flex-fill">
                            <i class="fa-solid fa-check me-1"></i> Simpan Produk
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