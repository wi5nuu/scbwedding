<?php
// Konfigurasi database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'scb_wedding');

// Buat koneksi database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Periksa koneksi
if ($conn->connect_error) {
    // Catat error ke file log
    if (!file_exists('logs')) {
        mkdir('logs', 0755, true);
    }
    error_log("Database connection failed: " . $conn->connect_error, 3, "logs/errors.log");
    
    // Tampilkan pesan error ramah pengguna
    header("Location: error.php?message=Unable to connect to the database. Please try again later.");
    exit;
}

// Set charset untuk mencegah masalah encoding
$conn->set_charset("utf8mb4");
?>