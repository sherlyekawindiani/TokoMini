<?php
session_start();


session_destroy();

// Pindahkan user kembali ke halaman login secara otomatis
header("Location: login.php");
exit;