<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Alle studenter</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:900px;margin:40px auto}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #ccc;padding:8px 10px;text-align:left}
    th{background:#f6f6f6}
  </style>
</head>
<body>
  <h2>Alle studenter</h2>
  <table>
    <tr>
      <th>brukernavn</th><th>fornavn</th><th>etternavn</th><th>klassekode</th><th>Handling</th>
    </tr>
    <?php
      $stmt = $pdo->query("SELECT brukernavn, fornavn, etternavn, klassekode FROM student ORDER BY brukernavn");
      foreach ($stmt as $s):
    ?>
    <tr>
      <td><?= htmlspecialchars($s['brukernavn']) ?></td>
      <td><?= htmlspecialchars($s['fornavn']) ?></td>
      <td><?= htmlspecialchars($s['etternavn']) ?></td>
      <td><?= htmlspecialchars($s['klassekode']) ?></td>
      <td><a href="slett.php?type=student&kode=<?= urlencode($s['brukernavn']) ?>">Slett</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="index.php">Tilbake</a></p>
</body>
</html>
