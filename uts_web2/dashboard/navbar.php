<?php
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* --- TEMA DEFAULT (LIGHT MODE) --- */
    :root {
        --bg-body: #fffbeb;
        --bg-card: #ffffff;
        --border-card: #fef3c7;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --navbar-bg: #0a5a60;
        --navbar-border: #f9d06b;
        --card-total-bg: #f9d06b;
        --card-total-text: #0a5a60;
        --table-thead: #f8fafc;
    }

    /* --- TEMA DARK MODE --- */
    [data-bs-theme="dark"] {
        --bg-body: #052e31;
        --bg-card: #074347;
        --border-card: #0a5a60;
        --text-main: #f8fafc;
        --text-muted: #94a3b8;
        --navbar-bg: #042426;
        --navbar-border: #0a5a60;
        --card-total-bg: #0a5a60;
        --card-total-text: #f9d06b;
        --table-thead: #0a5a60;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-body) !important;
        color: var(--text-main);
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .navbar-custom {
        background-color: var(--navbar-bg) !important;
        border-bottom: 2px solid var(--navbar-border);
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .navbar-custom .navbar-brand {
        color: #ffffff !important;
        font-weight: 700;
    }
    .navbar-custom .nav-link {
        color: #ccdcd2 !important;
        font-weight: 500;
        transition: color 0.2s ease;
    }
    .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active {
        color: #f9d06b !important;
    }
    .card-custom {
        background-color: var(--bg-card) !important;
        border: 1px solid var(--border-card) !important;
        border-radius: 16px !important;
        color: var(--text-main) !important;
        transition: all 0.3s ease;
    }
    .text-dark {
        color: var(--text-main) !important;
    }
    .text-muted {
        color: var(--text-muted) !important;
    }
    .btn-teal-action {
        background-color: #0a5a60;
        color: #ffffff;
        border: none;
    }
    .btn-teal-action:hover {
        background-color: #074347;
        color: #ffffff;
    }
    .table {
        color: var(--text-main) !important;
    }
    .table-light {
        --bs-table-bg: var(--table-thead) !important;
        color: var(--text-main) !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm mb-4 py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="../dashboard/index.php">
            <i class="fa-solid fa-store me-2" style="color: #f9d06b !important;"></i> TOKO MINI
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard/index.php"><i class="fa-solid fa-chart-pie me-1"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kategori/index.php"><i class="fa-solid fa-tags me-1"></i> Kelola Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../produk/index.php"><i class="fa-solid fa-box me-1"></i> Kelola Produk</a>
                </li>
            </ul>
            
            <div class="d-flex align-items-center gap-3">
                <!-- Tombol Switch Dark/Light Mode -->
                <button class="btn text-white border-0 d-flex align-items-center gap-2 p-1" id="themeToggle" type="button" title="Ganti Tema">
                    <i class="fa-solid fa-moon fs-5" id="themeIcon" style="color: #f9d06b;"></i>
                    <span class="small fw-semibold" id="themeText" style="color: #f9d06b; font-size: 0.85rem;">Light</span>
                </button>

                <span class="text-white small">
                    <i class="fa-regular fa-user-circle me-1" style="color: #f9d06b;"></i> <strong><?= $_SESSION['username']; ?></strong> (<small><?= $_SESSION['status']; ?></small>)
                </span>
                <a href="../auth/logout.php" class="btn btn-sm px-3 fw-medium" style="background-color: #f9d06b; color: #0a5a60;">
                    <i class="fa-solid fa-power-off me-1"></i> Keluar
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- JavaScript Otomatis untuk Mengontrol State Dark Mode -->
<script>
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const htmlElement = document.documentElement;

    // Cek status penyimpanan tema di browser lokal
    const currentTheme = localStorage.getItem('theme') || 'light';
    htmlElement.setAttribute('data-bs-theme', currentTheme);
    updateIcon(currentTheme);

    themeToggle.addEventListener('click', () => {
        let theme = htmlElement.getAttribute('data-bs-theme');
        if (theme === 'dark') {
            theme = 'light';
        } else {
            theme = 'dark';
        }
        htmlElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
        updateIcon(theme);
    });

    function updateIcon(theme) {
        if (theme === 'dark') {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        } else {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    }
</script>