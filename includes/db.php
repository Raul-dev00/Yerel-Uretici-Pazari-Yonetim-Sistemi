<?php
$host = 'localhost'; // Hostingde genellikle 'localhost' kullanılır, phpMyAdmin'de de öyle → doğru
$db   = 'dbstorage23360859716';
$user = 'dbusr23360859716';
$pass = 'buI8vxXHm0Kw';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
