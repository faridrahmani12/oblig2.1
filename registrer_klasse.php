<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $db->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?,?,?)");
  $stmt->bind_param("sss", $_POST['klassekode'], $_POST['klassenavn'], $_POST['studiumkode']);
  $stmt->execute();
  $stmt->close();
  header("Location: vis_klasser.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8" />
  <title>Registrer klasse</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:720px;margin:40px auto}
    label{display:block;margin:10px 0 4px}
    input{width:100%;padding:8px}
  </style>
</head>
<body>
  <h2>Registrer klasse</h2>
  <form method="post">
    <label>Klassekode</label>
    <input name="klassekode" maxlength="5" required />
    <label>Klassenavn</label>
    <input name="klassenavn" required />
    <label>Studiumkode</label>
    <input name="studiumkode" required />
    <p><button type="submit">Lagre</button> <a href="index.php">Avbryt</a></p>
  </form>
</body>
</html>

