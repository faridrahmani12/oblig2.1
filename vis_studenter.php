<?php
require 'db.php';
$studenter = $pdo->query("SELECT * FROM student ORDER BY brukernavn")->fetchAll();
?>
<h2>Alle studenter</h2>
<table border="1" cellpadding="5">
<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th><th>Handling</th></tr>
<?php foreach ($studenter as $s): ?>
<tr>
  <td><?= htmlspecialchars($s['brukernavn']) ?></td>
  <td><?= htmlspecialchars($s['fornavn']) ?></td>
  <td><?= htmlspecialchars($s['etternavn']) ?></td>
  <td><?= htmlspecialchars($s['klassekode']) ?></td>
  <td><a href="slett.php?type=student&kode=<?= urlencode($s['brukernavn']) ?>">Slett</a></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="index.php">Tilbake til meny</a></p>
