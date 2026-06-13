<?php
// Konfigurasi Database untuk MySQL Workbench
$host = "127.0.0.1"; 
$user = "root";      
$pass = "root123";          
$db   = "db_tokomini"; 

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek status koneksi apakah berhasil atau gagal
if (!$koneksi) {
    die("<div style='color: red; padding: 10px; background: #fce4d6; font-weight: bold;'>
            ✗ KONEKSI GAGAL: " . mysqli_connect_error() . "
         </div>");
}
?>