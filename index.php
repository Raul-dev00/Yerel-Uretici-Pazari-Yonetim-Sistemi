<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ürünlerim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Hoşgeldin, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<a href="add_product.php" class="btn btn-success mb-3">+ Yeni Ürün Ekle</a>
<a href="logout.php" class="btn btn-secondary mb-3 float-end">Çıkış Yap</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ürün Adı</th>
            <th>Açıklama</th>
            <th>Fiyat</th>
            <th>Stok</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary btn-sm">Düzenle</a>
                <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?');">Sil</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
