<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
  $stmt->execute([$_POST['brukernavn'], $_POST['fornavn'], $_POST['etternavn'], $_POST['klassekode']]);
  header("Location: vis_studenter.php");
  exit;
}
$klasser = $pdo->query("SELECT klassekode, klassenavn FROM klasse ORDER BY klassekode")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Registrer student</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:720px;margin:40px auto}
    label{display:block;margin:10px 0 4px}
    input,select{width:100%;padding:8px}
  </style>
</head>
<body>
  <h2>Registrer student</h2>
  <form method="post">
    <label>Brukernavn</label>
    <input name="brukernavn" maxlength="10" required>
    <label>Fornavn</label>
    <input name="fornavn" required>
    <label>Etternavn</label>
    <input name="etternavn" required>
    <label>Klassekode</label>
    <select name="klassekode" required>
      <?php foreach ($klasser as $k): ?>
        <option value="<?= htmlspecialchars($k['klassekode']) ?>">
          <?= htmlspecialchars($k['klassekode'].' - '.$k['klassenavn']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <p><button type="submit">Lagre</button> <a href="index.php">Avbryt</a></p>
  </form>
</body>
</html>
