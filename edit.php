<?php 
include 'koneksi.php'; 

$id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result);


if (isset($_POST['update'])) {
    $nama     = $_POST['nama_barang'];
    $stok     = $_POST['stok'];
    $kategori = $_POST['kategori'];

    $updateQuery = "UPDATE barang SET nama_barang='$nama', stok='$stok', kategori='$kategori' WHERE id=$id";
    if (mysqli_query($koneksi, $updateQuery)) {
        header("Location: index.php");
    } else {
        echo "Gagal mengupdate: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang - StokKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-yellow-600">✏️ Edit Barang</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Stok</label>
                <input type="number" name="stok" value="<?php echo $data['stok']; ?>" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Kategori</label>
                <input type="text" name="kategori" value="<?php echo $data['kategori']; ?>" class="w-full border p-2 rounded">
            </div>
            <div class="flex gap-2">
                <button type="submit" name="update" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update Data</button>
                <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>