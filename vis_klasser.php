<?php require_once __DIR__ . '/db.php'; ?>
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8" />
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
      $res = $db->query("SELECT klassekode, klassenavn, studiumkode FROM klasse ORDER BY klassekode");
      while ($k = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".htmlspecialchars($k['klassekode'])."</td>";
        echo "<td>".htmlspecialchars($k['klassenavn'])."</td>";
        echo "<td>".htmlspecialchars($k['studiumkode'])."</td>";
        echo "<td><a href=\"slett.php?type=klasse&kode=".urlencode($k['klassekode'])."\">Slett</a></td>";
        echo "</tr>";
      }
    ?>
  </table>
  <p><a href="index.php">Tilbake</a></p>
</body>
</html>

