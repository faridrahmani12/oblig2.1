<?php require_once __DIR__ . '/db.php'; ?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8" />
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
      $res = $db->query("SELECT brukernavn, fornavn, etternavn, klassekode FROM student ORDER BY brukernavn");
      while ($s = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".htmlspecialchars($s['brukernavn'])."</td>";
        echo "<td>".htmlspecialchars($s['fornavn'])."</td>";
        echo "<td>".htmlspecialchars($s['etternavn'])."</td>";
        echo "<td>".htmlspecialchars($s['klassekode'])."</td>";
        echo "<td><a href=\"slett.php?type=student&kode=".urlencode($s['brukernavn'])."\">Slett</a></td>";
        echo "</tr>";
      }
    ?>
  </table>
  <p><a href="index.php">Tilbake</a></p>
</body>
</html>

