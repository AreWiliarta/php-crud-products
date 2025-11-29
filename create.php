<?php require 'config/database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<h2>Tambah Produk</h2>
<a href="index.php">Kembali</a><br><br>

<form action="" method="POST" enctype="multipart/form-data">

    Nama: <br>
    <input type="text" name="name" required><br><br>

    Kategori: <br>
    <select name="category">
        <option value="makanan">Makanan</option>
        <option value="minuman">Minuman</option>
        <option value="lainnya">Lainnya</option>
    </select><br><br>

    Harga: <br>
    <input type="number" step="0.01" name="price" required><br><br>

    Stok: <br>
    <input type="number" name="stock" required><br><br>

    Gambar: <br>
    <input type="file" name="image" required><br><br>

    Status: <br>
    <select name="status">
        <option value="active">Aktif</option>
        <option value="inactive">Tidak Aktif</option>
    </select><br><br>

    <button type="submit" name="submit">Simpan</button>

</form>

<?php
if (isset($_POST['submit'])) {

    $name     = $_POST['name'];
    $category = $_POST['category'];
    $price    = $_POST['price'];
    $stock    = $_POST['stock'];
    $status   = $_POST['status'];

    // file upload
    $fileName = $_FILES['image']['name'];
    $tmpName  = $_FILES['image']['tmp_name'];

    $newName = time() . "_" . $fileName;
    move_uploaded_file($tmpName, "uploads/" . $newName);

    $sql = "INSERT INTO products (name, category, price, stock, image_path, status)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $category, $price, $stock, $newName, $status]);

    header("Location: index.php");
}
?>
