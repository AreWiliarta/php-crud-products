<?php
require 'config/database.php';

// proses submit POST ada di bawah
if (isset($_POST['submit'])) {
    // ... proses tambah data
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Tambah Produk</h2>
    <a class="button" href="index.php">Kembali</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="name" required>

        <label>Kategori</label>
        <select name="category">
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
            <option value="lainnya">Lainnya</option>
        </select>

        <label>Harga</label>
        <input type="number" step="0.01" name="price" required>

        <label>Stok</label>
        <input type="number" name="stock" required>

        <label>Gambar</label>
        <input type="file" name="image">

        <label>Status</label>
        <select name="status">
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select>

        <button type="submit" name="submit">Tambah</button>
    </form>

</div> <!-- Tutup container -->

</body>
</html>
