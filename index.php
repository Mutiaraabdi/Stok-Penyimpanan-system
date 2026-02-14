<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StokKu - Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center bg-no-repeat min-h-screen" style="background-image: url('bg-inventory.jpg'); background-attachment: fixed;">
    <div class="min-h-screen bg-white/80 backdrop-blur-sm p-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-blue-600 mb-6">📦 Stok Penyimpanan</h1>
        
        <a href="tambah.php" class="inline-block bg-green-500 text-white px-4 py-2 rounded mb-4 hover:bg-green-600">
            + Tambah Barang Baru
        </a>

        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h2 class="text-xl font-semibold mb-4">Daftar Stok Barang</h2>
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-center">No</th>
                        <th class="px-4 py-2 text-left">Nama Barang</th>
                        <th class="px-4 py-2 text-center">Stok</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    $query = "SELECT * FROM barang ORDER BY id DESC";
                    $tampil = mysqli_query($koneksi, $query);
                    $no = 1;

                    if (mysqli_num_rows($tampil) > 0) {
                        while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-center"><?php echo $no++; ?></td>
                            <td class="px-4 py-2"><?php echo $data['nama_barang']; ?></td>
                            <td class="px-4 py-2 text-center"><?php echo $data['stok']; ?></td>
                            <td class="px-4 py-2"><?php echo $data['kategori']; ?></td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Edit</a>
                                    <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='5' class='text-center py-4 text-gray-500 italic'>Belum ada data barang.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>