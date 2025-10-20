<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Alle klasser</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:900px;margin:40px auto}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #ccc;padding:8px 10px;text-align:left}
    th{background:#f6f6f6}
  </style>
</head>
<body>
  <h2>Alle klasser</h2>
  <table>
    <tr>
      <th>klassekode</th><th>klassenavn</th><th>studiumkode</th><th>Handling</th>
    </tr>
    <?php
      $stmt = $pdo->query("SELECT klassekode, klassenavn, studiumkode FROM klasse ORDER BY klassekode");
      foreach ($stmt as $k):
    ?>
    <tr>
      <td><?= htmlspecialchars($k['klassekode']) ?></td>
      <td><?= htmlspecialchars($k['klassenavn']) ?></td>
      <td><?= htmlspecialchars($k['studiumkode']) ?></td>
      <td><a href="slett.php?type=klasse&kode=<?= urlencode($k['klassekode']) ?>">Slett</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="index.php">Tilbake</a></p>
</body>
</html>
