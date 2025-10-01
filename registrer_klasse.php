<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['klassekode'], $_POST['klassenavn'], $_POST['studiumkode']]);
    echo "Klasse registrert!";
}
?>

<form method="post">
  Klassekode: <input name="klassekode"><br>
  Klassenavn: <input name="klassenavn"><br>
  Studiumkode: <input name="studiumkode"><br>
  <button type="submit">Lagre</button>
</form>

