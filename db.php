<?php
$host = "mysql";               // USN sin database-server
$dbname = "farah6535";         // Ditt databasenavn
$user = "farah6535";           // Ditt brukernavn
$pass = "a999farah6535";       // Ditt passord

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseforbindelse feilet: " . $e->getMessage());
}
?>

