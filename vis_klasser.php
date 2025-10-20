<?php
require 'db.php';
$klasser = $pdo->query("SELECT * FROM klasse ORDER BY klassekode")->fetchAll();
?>
<h2>Alle klasser</h2>
<table border="1" cellpadding="5">
<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th><th>Handling</th></tr>
<?php foreach ($klasser as $k): ?>
<tr>
  <td><?= htmlspecialchars($k['klassekode']) ?></td>
  <td><?= htmlspecialchars($k['klassenavn']) ?></td>
  <td><?= htmlspecialchars($k['studiumkode']) ?></td>
  <td><a href="slett.php?type=klasse&kode=<?= urlencode($k['klassekode']) ?>">Slett</a></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="index.php">Tilbake til meny</a></p>

