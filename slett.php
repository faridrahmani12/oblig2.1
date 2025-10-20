<?php
require 'db.php';

if (!isset($_GET['type'], $_GET['kode'])) {
    die("Ugyldig forespørsel");
}

$type = $_GET['type'];
$kode = $_GET['kode'];

if ($type === 'klasse') {
    $stmt = $pdo->prepare("DELETE FROM klasse WHERE klassekode = ?");
    $stmt->execute([$kode]);
    echo "<p>Klasse slettet!</p>";
} elseif ($type === 'student') {
    $stmt = $pdo->prepare("DELETE FROM student WHERE brukernavn = ?");
    $stmt->execute([$kode]);
    echo "<p>Student slettet!</p>";
} else {
    echo "<p>Ukjent type.</p>";
}
?>
<p><a href="index.php">Tilbake til meny</a></p>
