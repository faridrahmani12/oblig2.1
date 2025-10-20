<?php
require_once __DIR__ . '/db.php';

if (!isset($_GET['type'], $_GET['kode'])) {
  http_response_code(400);
  exit('Ugyldig forespørsel');
}

$type = $_GET['type'];
$kode = $_GET['kode'];

if ($type === 'klasse') {
  $stmt = $db->prepare("DELETE FROM klasse WHERE klassekode=?");
  $stmt->bind_param("s", $kode);
  $stmt->execute();
  $stmt->close();
  header("Location: vis_klasser.php");
  exit;
}

if ($type === 'student') {
  $stmt = $db->prepare("DELETE FROM student WHERE brukernavn=?");
  $stmt->bind_param("s", $kode);
  $stmt->execute();
  $stmt->close();
  header("Location: vis_studenter.php");
  exit;
}

http_response_code(400);
echo "Ukjent type";
