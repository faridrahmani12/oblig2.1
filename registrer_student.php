<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['brukernavn'], $_POST['fornavn'], $_POST['etternavn'], $_POST['klassekode']]);
    echo "Student registrert!";
}

$klasser = $pdo->query("SELECT * FROM klasse")->fetchAll();
?>

<form method="post">
  Brukernavn: <input name="brukernavn"><br>
  Fornavn: <input name="fornavn"><br>
  Etternavn: <input name="etternavn"><br>
  Klassekode:
  <select name="klassekode">
    <?php foreach ($klasser as $k) {
      echo "<option value='{$k['klassekode']}'>{$k['klassekode']} - {$k['klassenavn']}</option>";
    } ?>
  </select><br>
  <button type="submit">Lagre</button>
</form>

