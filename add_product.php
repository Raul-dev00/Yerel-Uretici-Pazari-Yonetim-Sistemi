<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $stmt = $pdo->prepare("INSERT INTO products (user_id, product_name, description, price, stock_quantity) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $product_name, $description, $price, $stock_quantity]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ürün Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Yeni Ürün Ekle</h2>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Ürün Adı</label>
        <input type="text" name="product_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Açıklama</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Fiyat</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Stok Miktarı</label>
        <input type="number" name="stock_quantity" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Ürün Ekle</button>
    <a href="index.php" class="btn btn-secondary">Geri Dön</a>
</form>

</body>
</html>
