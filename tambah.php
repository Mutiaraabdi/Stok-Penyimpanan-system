<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang - StokKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center" style="background-image: url('bg-inventory.jpg');">
    <div class="w-full max-w-lg bg-white/90 backdrop-blur-md p-6 rounded-lg shadow-xl m-4">
        <h2 class="text-2xl font-bold mb-4 text-blue-600">➕ Tambah Barang Baru</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Stok</label>
                <input type="number" name="stok" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Kategori</label>
                <input type="text" name="kategori" class="w-full border p-2 rounded" placeholder="Contoh: Elektronik, Makanan">
            </div>
            <div class="flex gap-2">
                <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Barang</button>
                <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            </div>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $nama     = $_POST['nama_barang'];
            $stok     = $_POST['stok'];
            $kategori = $_POST['kategori'];

            $query = "INSERT INTO barang (nama_barang, stok, kategori) VALUES ('$nama', '$stok', '$kategori')";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                echo "<p class='mt-4 text-green-600 font-bold'>✅ Barang berhasil ditambahkan!</p>";
            } else {
                echo "<p class='mt-4 text-red-600'>❌ Gagal: " . mysqli_error($koneksi) . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>