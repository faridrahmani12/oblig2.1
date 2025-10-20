<?php
require_once 'db.php';

// Slett tabeller hvis de finnes (for testing)
$conn->query("DROP TABLE IF EXISTS student");
$conn->query("DROP TABLE IF EXISTS klasse");

// Opprett tabell for klasse
$conn->query("CREATE TABLE klasse (
    klassekode VARCHAR(10) PRIMARY KEY,
    klassenavn VARCHAR(50) NOT NULL,
    studiumkode VARCHAR(20) NOT NULL
)");

// Opprett tabell for student
$conn->query("CREATE TABLE student (
    brukernavn VARCHAR(20) PRIMARY KEY,
    fornavn VARCHAR(50) NOT NULL,
    etternavn VARCHAR(50) NOT NULL,
    klassekode VARCHAR(10),
    FOREIGN KEY (klassekode) REFERENCES klasse(klassekode)
)");

// Sett inn eksempeldata
$conn->query("INSERT INTO klasse VALUES
('IT1', 'IT og ledelse 1. år', 'ITLED'),
('IT2', 'IT og ledelse 2. år', 'ITLED'),
('IT3', 'IT og ledelse 3. år', 'ITLED')");

$conn->query("INSERT INTO student VALUES
('gb', 'Geir', 'Bjarvin', 'IT1'),
('mrj', 'Marius R.', 'Johannessen', 'IT1'),
('tb', 'Tove', 'Bøe', 'IT2')");

echo "<h3>Tabeller opprettet og demo-data lagt inn!</h3>";
echo "<a href='index.php'>Tilbake til meny</a>";

$conn->close();
?>

