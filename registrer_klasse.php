<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['klassekode'];
    $navn = $_POST['klassenavn'];
    $studium = $_POST['studiumkode'];

    $stmt = $conn->prepare("INSERT INTO klasse VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $kode, $navn, $studium);

    if ($stmt->execute()) {
        echo "Klasse registrert!";
    } else {
        echo "Feil: " . $conn->error;
    }

    echo "<br><a href='index.php'>Tilbake</a>";
    exit;
}
?>
<h2>Registrer klasse</h2>
<form method="post">
    Klassekode: <input type="text" name="klassekode" required><br>
    Klassenavn: <input type="text" name="klassenavn" required><br>
    Studiumkode: <input type="text" name="studiumkode" required><br>
    <input type="submit" value="Registrer">
</form>
<a href="index.php">Tilbake</a>


