<?php 
require 'config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();
?>

<h2>Edit Produk</h2>
<a href="index.php">Kembali</a><br><br>

<form action="" method="POST" enctype="multipart/form-data">

    Nama: <br>
    <input type="text" name="name" value="<?= $data['name'] ?>" required><br><br>

    Kategori: <br>
    <select name="category">
        <option value="makanan" <?= $data['category']=="makanan"?"selected":"" ?>>Makanan</option>
        <option value="minuman" <?= $data['category']=="minuman"?"selected":"" ?>>Minuman</option>
        <option value="lainnya" <?= $data['category']=="lainnya"?"selected":"" ?>>Lainnya</option>
    </select><br><br>

    Harga: <br>
    <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required><br><br>

    Stok: <br>
    <input type="number" name="stock" value="<?= $data['stock'] ?>" required><br><br>

    Gambar (biarkan kosong jika tidak ganti): <br>
    <input type="file" name="image"><br>
    <img src="uploads/<?= $data['image_path'] ?>" width="80"><br><br>

    Status: <br>
    <select name="status">
        <option value="active"   <?= $data['status']=="active"?"selected":"" ?>>Aktif</option>
        <option value="inactive" <?= $data['status']=="inactive"?"selected":"" ?>>Tidak Aktif</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>

</form>

<?php
if (isset($_POST['update'])) {

    $name     = $_POST['name'];
    $category = $_POST['category'];
    $price    = $_POST['price'];
    $stock    = $_POST['stock'];
    $status   = $_POST['status'];

    // Jika user upload gambar baru
    if (!empty($_FILES['image']['name'])) {
        $fileName = $_FILES['image']['name'];
        $tmpName  = $_FILES['image']['tmp_name'];

        $newName = time() . "_" . $fileName;
        move_uploaded_file($tmpName, "uploads/" . $newName);

        $imagePath = $newName;
    } else {
        $imagePath = $data['image_path'];
    }

    $sql = "UPDATE products
            SET name=?, category=?, price=?, stock=?, image_path=?, status=?
            WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $category, $price, $stock, $imagePath, $status, $id]);

    header("Location: index.php");
}
?>
