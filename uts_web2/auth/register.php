<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register - Toko Mini</title>
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
            .register-container { max-width: 420px; margin-top: 60px; }
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
            <div class="card register-container shadow-sm border-0 rounded-4 p-4 card-custom w-100">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3" style="width: 70px; height: 70px; background-color: #ecfdf5 !important;">
                        <i class="fa-solid fa-user-plus fs-2 text-teal"></i>
                    </div>
                    <h3 class="fw-bold text-teal">DAFTAR AKUN</h3>
                    <p class="text-muted small">Buat akun halaman mockup baru</p>
                </div>
                
                <form onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted small"><i class="fa-regular fa-user"></i></span>
                            <input type="text" class="form-control border-start-0 py-2" placeholder="Tuliskan username" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted small"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control border-start-0 py-2" placeholder="Tuliskan password" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Status</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted small"><i class="fa-solid fa-user-shield"></i></span>
                            <select class="form-select border-start-0 py-2" required>
                                <option value="" disabled selected>Pilih status</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-teal w-100 py-2 rounded-3 mb-2">Daftar Akun</button>
                </form>
                
                <div class="text-center mt-3">
                    <p class="mb-0 text-muted small">Sudah punya akun? <a href="login.php" class="text-decoration-none fw-bold text-teal">Masuk disini</a></p>
                </div>
            </div>
        </div>

    </body>
</html>