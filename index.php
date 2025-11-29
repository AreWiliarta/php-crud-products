<?php 
require 'config/database.php'; // koneksi database

// ambil data produk
$stmt = $pdo->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Mulai container -->
<div class="container">

    <h2>Product List</h2>
    <a class="button add" href="create.php">Tambah Produk</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['category'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td>
                <?php if(!empty($row['image_path'])): ?>
                <img src="uploads/<?= $row['image_path'] ?>" width="80">
                <?php endif; ?>
            </td>
            <td><?= $row['status'] ?></td>
            <td>
                <a class="button edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="button delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>
</div> <!-- Tutup container -->

</body>
</html>
