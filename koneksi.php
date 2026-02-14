<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "stokku";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
// Jika berhasil, tidak akan muncul pesan apa-apa
?>