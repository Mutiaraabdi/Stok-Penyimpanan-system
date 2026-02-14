<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Perintah hapus data berdasarkan ID
$query = "DELETE FROM barang WHERE id = $id";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    // Jika berhasil, otomatis kembali ke halaman utama
    header("Location: index.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>