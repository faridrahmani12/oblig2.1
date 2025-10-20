<?php
require_once 'db.php';
$result = $conn->query("SELECT * FROM klasse");

echo "<h2>Alle klasser</h2>";
echo "<table border='1'>
<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['klassekode']}</td>
            <td>{$row['klassenavn']}</td>
            <td>{$row['studiumkode']}</td>
          </tr>";
}
echo "</table>";
echo "<a href='index.php'>Tilbake</a>";

$conn->close();
?>

