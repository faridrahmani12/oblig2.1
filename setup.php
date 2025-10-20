<?php
require 'db.php';

// Opprett tabeller
$sql = "
CREATE TABLE IF NOT EXISTS klasse (
  klassekode CHAR(5) NOT NULL,
  klassenavn VARCHAR(100) NOT NULL,
  studiumkode VARCHAR(50) NOT NULL,
  PRIMARY KEY (klassekode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS student (
  brukernavn CHAR(10) NOT NULL,
  fornavn VARCHAR(100) NOT NULL,
  etternavn VARCHAR(100) NOT NULL,
  klassekode CHAR(5) NOT NULL,
  PRIMARY KEY (brukernavn),
  FOREIGN KEY (klassekode) REFERENCES klasse(klassekode) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
$pdo->exec($sql);

// Sett inn eksempeldata (gjør ikke noe hvis allerede finnes)
$stmt = $pdo->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE klassekode=klassekode");
$stmt->execute(['IT1', 'IT og ledelse 1. år', 'ITLED']);
$stmt->execute(['IT2', 'IT og ledelse 2. år', 'ITLED']);
$stmt->execute(['IT3', 'IT og ledelse 3. år', 'ITLED']);

$stmt2 = $pdo->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE brukernavn=brukernavn");
$stmt2->execute(['gb', 'Geir', 'Bjarvin', 'IT1']);
$stmt2->execute(['mrj', 'Marius R.', 'Johannessen', 'IT1']);
$stmt2->execute(['tb', 'Tove', 'Bøe', 'IT2']);

echo "Setup ferdig: tabeller opprettet og eksempeldata lagt inn.";
?>
