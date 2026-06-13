<?php
session_start();
include '../config/koneksi.php';

$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);
    
    $password_md5 = md5($password);
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password_md5' AND status='$status'";
    $data  = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($data) > 0) {
        $user_valid = mysqli_fetch_assoc($data);
        
        $_SESSION['login']    = true;
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['status']   = $user_valid['status'];
        
        header("Location: ../dashboard/index.php");
        exit;
    } else {
        $error = "Username, Password, atau Status tidak sesuai!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Toko Mini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #fffbeb;
                color: #0f172a;
            }
            .login-container { max-width: 420px; margin-top: 80px; }
            .card-custom {
                background-color: #ffffff;
                border: 1px solid #fef3c7 !important;
            }
            .btn-teal {
                background-color: #0a5a60;
                color: #ffffff;
                border: none;
                font-weight: 600;
                transition: all 0.2s ease-in-out;
            }
            .btn-teal:hover {
                background-color: #f9d06b;
                color: #0a5a60;
            }
            .text-teal { color: #0a5a60; }
        </style>
    </head>
    <body>

        <div class="container d-flex justify-content-center">
            <div class="card login-container shadow-sm border-0 rounded-4 p-4 card-custom w-100">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3" style="width: 70px; height: 70px; background-color: #ecfdf5 !important;">
                        <i class="fa-solid fa-right-to-bracket fs-2 text-teal"></i>
                    </div>
                    <h3 class="fw-bold text-teal">LOGIN SYSTEM</h3>
                    <p class="text-muted small">Silakan masuk menggunakan akun Anda</p>
                </div>
                
                <?php if ($error != "") : ?>
                    <div class="alert alert-danger text-center p-2 small rounded-3" role="alert">
                        <i class="fa-solid fa-circle-exclamation me-1"></i> <?= $error; ?>
                    </div>
                <?php endif; ?>
                
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted small"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="username" class="form-control border-start-0 py-2 small" placeholder="Tuliskan username" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted small"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control border-start-0 py-2" placeholder="Tuliskan password" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Status Pengguna</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted small"><i class="fa-solid fa-user-shield"></i></span>
                            <select name="status" class="form-select border-start-0 py-2" required>
                                <option value="" disabled selected>Pilih status</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-teal w-100 mb-2 py-2 rounded-3">
                        Masuk <i class="fa-solid fa-arrow-right ms-1"></i>
                    </button>
                </form>
                
                <div class="text-center mt-3">
                    <p class="mb-0 text-muted small">Belum punya akun? <a href="register.php" class="text-decoration-none fw-bold text-teal">Daftar akun</a></p>
                </div>
            </div>
        </div>

    </body>
</html>