<?php
require 'db.php';

if (!isset($_GET['type'], $_GET['kode'])) {
  http_response_code(400);
  exit('Ugyldig forespørsel');
}

$type = $_GET['type'];
$kode = $_GET['kode'];

if ($type === 'klasse') {
  $stmt = $pdo->prepare("DELETE FROM klasse WHERE klassekode = ?");
  $stmt->execute([$kode]);
  header("Location: vis_klasser.php");
  exit;
}
if ($type === 'student') {
  $stmt = $pdo->prepare("DELETE FROM student WHERE brukernavn = ?");
  $stmt->execute([$kode]);
  header("Location: vis_studenter.php");
  exit;
}

http_response_code(400);
echo "Ukjent type";
