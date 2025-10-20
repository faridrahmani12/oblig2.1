<?php
$host = 'mysql-' . getenv('USER') . '.dokploy.usn.no';
$user = 'farah6535';
$pass = 'a999farah6535';
$dbname = 'farah6535';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Databaseforbindelse feilet: " . $conn->connect_error);
}
?>

