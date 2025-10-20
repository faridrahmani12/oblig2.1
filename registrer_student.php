<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['brukernavn'], $_POST['fornavn'], $_POST['etternavn'], $_POST['klassekode']]);
    echo "<p>Student registrert!</p>";
}

$klasser = $pdo->query("SELECT * FROM klasse ORDER BY klassekode")->fetchAll();
?>
<form method="post">
    Brukernavn: <input name="brukernavn" required><br>
    Fornavn: <input name="fornavn" required><br>
    Etternavn: <input name="etternavn" required><br>
    Klassekode:
    <select name="klassekode" required>
        <?php foreach ($klasser as $k): ?>
            <option value="<?= htmlspecialchars($k['klassekode']) ?>">
                <?= htmlspecialchars($k['klassekode']) ?> - <?= htmlspecialchars($k['klassenavn']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Lagre</button>
</form>
<p><a href="index.php">Tilbake til meny</a></p>

