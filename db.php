<?php
// USN Dokploy: bruk verdiene dine her
$host = "mysql";
$dbname = "farah6535";
$user = "farah6535";
$pass = "a999farah6535";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseforbindelse feilet: " . $e->getMessage());
}
?>

