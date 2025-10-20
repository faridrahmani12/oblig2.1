<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Bruk verdiene fra "MySQL Database details" i Dokploy
$host = "mysql-farah6535";   // ← sjekk hva det står hos deg i Dokploy
$user = "farah6535";
$pass = "a999farah6535";
$dbname = "farah6535";

try {
    $db = new mysqli($host, $user, $pass, $dbname);
    $db->set_charset("utf8mb4");
} catch (Throwable $e) {
    die("Databaseforbindelse feilet.");
}
?>
