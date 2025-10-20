<?php
// Strengt og enkelt oppsett for USN Dokploy (MySQL-tjenesten heter vanligvis "mysql")
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "mysql";
$user = "farah6535";
$pass = "a999farah6535";
$dbname = "farah6535";
$port = 3306;

try {
    $db = new mysqli($host, $user, $pass, $dbname, $port);
    $db->set_charset("utf8mb4");
} catch (Throwable $e) {
    http_response_code(500);
    die("Databaseforbindelse feilet.");
}
