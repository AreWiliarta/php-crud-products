<?php
require 'config/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

// proses POST update ada di bawah
if (isset($_POST['update'])) {
    // ... proses update
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Edit Produk</h2>
    <a class="button" href="index.php">Kembali</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="name" value="<?= $data['name'] ?>" required>

        <label>Kategori</label>
        <select name="category">
            <option value="makanan" <?= $data['category']=="makanan"?"selected":"" ?>>Makanan</option>
            <option value="minuman" <?= $data['category']=="minuman"?"selected":"" ?>>Minuman</option>
            <option value="lainnya" <?= $data['category']=="lainnya"?"selected":"" ?>>Lainnya</option>
        </select>

        <label>Harga</label>
        <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required>

        <label>Stok</label>
        <input type="number" name="stock" value="<?= $data['stock'] ?>" required>

        <label>Gambar (kosong jika tidak ganti)</label>
        <input type="file" name="image">
        <?php if(!empty($data['image_path'])): ?>
            <img src="uploads/<?= $data['image_path'] ?>" width="80">
        <?php endif; ?>

        <label>Status</label>
        <select name="status">
            <option value="active" <?= $data['status']=="active"?"selected":"" ?>>Aktif</option>
            <option value="inactive" <?= $data['status']=="inactive"?"selected":"" ?>>Tidak Aktif</option>
        </select>

        <button type="submit" name="update">Update</button>
    </form>

</div> <!-- Tutup container -->

</body>
</html>
