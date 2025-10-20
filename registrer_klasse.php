<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['klassekode'], $_POST['klassenavn'], $_POST['studiumkode']]);
    echo "<p>Klasse registrert!</p>";
}
?>
<form method="post">
    Klassekode: <input name="klassekode" required><br>
    Klassenavn: <input name="klassenavn" required><br>
    Studiumkode: <input name="studiumkode" required><br>
    <button type="submit">Lagre</button>
</form>
<p><a href="index.php">Tilbake til meny</a></p>
