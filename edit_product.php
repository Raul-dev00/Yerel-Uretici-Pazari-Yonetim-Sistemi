<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

// Önce ürün sahibine ait mi kontrol edelim
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$product = $stmt->fetch();

if (!$product) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $stmt = $pdo->prepare("UPDATE products SET product_name = ?, description = ?, price = ?, stock_quantity = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$product_name, $description, $price, $stock_quantity, $id, $_SESSION['user_id']]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ürünü Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Ürünü Düzenle</h2>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Ürün Adı</label>
        <input type="text" name="product_name" class="form-control" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Açıklama</label>
        <textarea name="description" class="form-control"><?php echo htmlspecialchars($product['description']); ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Fiyat</label>
        <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Stok Miktarı</label>
        <input type="number" name="stock_quantity" class="form-control" value="<?php echo htmlspecialchars($product['stock_quantity']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
    <a href="index.php" class="btn btn-secondary">İptal</a>
</form>

</body>
</html>
