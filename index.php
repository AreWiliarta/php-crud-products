<?php require 'config/database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<h2>Product List</h2>
<a href="create.php">Tambah Produk</a>
<br><br>

<table border="1" cellpadding="8">
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

<?php
$stmt = $pdo->query("SELECT * FROM products");
while ($row = $stmt->fetch()) :
?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['category'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td>
            <?php if (!empty($row['image_path'])): ?>
                <img src="uploads/<?= $row['image_path'] ?>" width="80">
            <?php endif; ?>
        </td>
        <td><?= $row['status'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>

</table>
