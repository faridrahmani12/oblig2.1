<?php
require_once 'db.php';
$result = $conn->query("SELECT * FROM student");

echo "<h2>Alle studenter</h2>";
echo "<table border='1'>
<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['brukernavn']}</td>
            <td>{$row['fornavn']}</td>
            <td>{$row['etternavn']}</td>
            <td>{$row['klassekode']}</td>
          </tr>";
}
echo "</table>";
echo "<a href='index.php'>Tilbake</a>";

$conn->close();
?>
