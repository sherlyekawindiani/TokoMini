<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Menghitung data secara dinamis dari database
$jml_kategori = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM categories"));
$jml_produk   = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM products"));
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Toko Mini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Mengatur agar tombol detail bawah selaras dengan tema warna */
            .btn-detail-teal {
                background-color: #0a5a60;
                color: #ffffff;
                font-size: 0.85rem;
                font-weight: 500;
                transition: all 0.2s ease;
            }
            .btn-detail-teal:hover {
                background-color: #06393d;
                color: #ffffff;
            }
            .btn-detail-yellow {
                background-color: #ffffff;
                color: #0a5a60;
                font-size: 0.85rem;
                font-weight: 600;
                transition: all 0.2s ease;
                border: 1px solid transparent;
            }
            .btn-detail-yellow:hover {
                background-color: #0a5a60;
                color: #ffffff;
            }
            
            /* Sinkronisasi warna badge saat dark mode */
            [data-bs-theme="dark"] .badge-status {
                background-color: #f9d06b !important;
                color: #0a5a60 !important;
            }
        </style>
    </head>
    <body>

        <?php include 'navbar.php'; ?>

        <div class="container">
            
            <div class="card card-custom p-4 border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, var(--bg-card) 0%, #fff7d6 100%);">
                <script>
                  
                    document.addEventListener("DOMContentLoaded", function() {
                        const cardWelcome = document.querySelector('.card-custom[style*="linear-gradient"]');
                        if(cardWelcome) {
                            const checkTheme = () => {
                                if(document.documentElement.getAttribute('data-bs-theme') === 'dark') {
                                    cardWelcome.style.background = "linear-gradient(135deg, var(--bg-card) 0%, #052224 100%)";
                                } else {
                                    cardWelcome.style.background = "linear-gradient(135deg, var(--bg-card) 0%, #fff7d6 100%)";
                                }
                            };
                            checkTheme();
                            document.getElementById('themeToggle').addEventListener('click', () => setTimeout(checkTheme, 50));
                        }
                    });
                </script>
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-2" style="color: #0a5a60;"><i class="fa-solid fa-hand-wave me-2 text-warning" style="color:#f9d06b !important;"></i>Selamat Datang, <?= $_SESSION['username']; ?>!</h3>
                        <p class="text-muted mb-0 small">Anda masuk sebagai <span class="badge badge-status px-2 py-1 rounded-2 fw-semibold" style="background-color: #0a5a60; color: #ffffff;"><?= $_SESSION['status']; ?></span>. Senang melihat Anda kembali. Silakan gunakan menu navigasi atau pintasan di bawah untuk mengelola operasional Toko Mini.</p>
                    </div>
                    <div class="col-md-4 text-end d-none d-md-block">
                        <i class="fa-solid fa-chart-line fs-1 opacity-25" style="color: #0a5a60;"></i>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                
                <div class="col-md-6">
                    <div class="card card-custom p-4 shadow-sm position-relative overflow-hidden d-flex flex-column justify-content-between" style="border-left: 5px solid #0a5a60 !important; min-height: 180px;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h6 class="text-secondary small text-uppercase fw-bold mb-1">Total Kategori</h6>
                                <h2 class="fw-bold mb-0 text-dark"><?= $jml_kategori; ?> Kategori</h2>
                            </div>
                            <div class="p-3 rounded-3" style="background-color: rgba(10, 90, 96, 0.1);">
                                <i class="fa-solid fa-tags fs-3" style="color: #0a5a60;"></i>
                            </div>
                        </div>
                        <div>
                            <hr class="my-2 opacity-10">
                            <a href="../kategori/index.php" class="btn btn-detail-teal w-100 py-2 rounded-3 text-center d-block text-decoration-none">
                                Lihat Detail Kategori <i class="fa-solid fa-circle-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-4 shadow-sm border-0 d-flex flex-column justify-content-between" style="background-color: #f9d06b; border-radius: 16px; min-height: 180px;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h6 class="small text-uppercase fw-bold mb-1" style="color: #0a5a60;">Total Produk</h6>
                                <h2 class="fw-bold mb-0 text-dark" style="color: #0a5a60 !important;"><?= $jml_produk; ?> Produk</h2>
                            </div>
                            <div class="p-3 rounded-3" style="background-color: rgba(255, 255, 255, 0.4)">
                                <i class="fa-solid fa-box-open fs-3" style="color: #0a5a60;"></i>
                            </div>
                        </div>
                        <div>
                            <hr class="my-2 opacity-10" style="border-color: #0a5a60;">
                            <a href="../produk/index.php" class="btn btn-detail-yellow w-100 py-2 rounded-3 text-center d-block text-decoration-none">
                                Lihat Detail Produk <i class="fa-solid fa-circle-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>