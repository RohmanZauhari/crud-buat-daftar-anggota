<?php
$host = 'localhost';  // Nama host database (biasanya localhost)
$user = 'root';       // Nama pengguna database
$pass = '';           // Kata sandi pengguna database (kosongkan jika tidak ada)
$db   = 'db_kp';      // Nama database yang akan digunakan

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memilih database yang akan digunakan
mysqli_select_db($conn, $db);

?>
