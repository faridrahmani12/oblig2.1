<?php
$url = getenv("DATABASE_URL");
$dbparts = parse_url($url);

$host = $dbparts['host'];
$dbname = ltrim($dbparts['path'], '/');
$user = $dbparts['user'];
$pass = $dbparts['pass'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>


