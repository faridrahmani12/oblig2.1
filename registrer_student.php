<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bruker = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klasse = $_POST['klassekode'];

    $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $bruker, $fornavn, $etternavn, $klasse);

    if ($stmt->execute()) {
        echo "Student registrert!";
    } else {
        echo "Feil: " . $conn->error;
    }

    echo "<br><a href='index.php'>Tilbake</a>";
    exit;
}

$klasser = $conn->query("SELECT klassekode FROM klasse");
?>
<h2>Registrer student</h2>
<form method="post">
    Brukernavn: <input type="text" name="brukernavn" required><br>
    Fornavn: <input type="text" name="fornavn" required><br>
    Etternavn: <input type="text" name="etternavn" required><br>
    Klassekode:
    <select name="klassekode" required>
        <?php while ($row = $klasser->fetch_assoc()) {
            echo "<option value='{$row['klassekode']}'>{$row['klassekode']}</option>";
        } ?>
    </select><br>
    <input type="submit" value="Registrer">
</form>
<a href="index.php">Tilbake</a>

