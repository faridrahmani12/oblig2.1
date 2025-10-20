<?php
require 'db.php';

// Opprett tabeller
$pdo->exec("
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
  CONSTRAINT fk_student_klasse FOREIGN KEY (klassekode) REFERENCES klasse(klassekode)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

// Seed KLASSE
$insK = $pdo->prepare("
  INSERT INTO klasse (klassekode, klassenavn, studiumkode)
  VALUES (?, ?, ?)
  ON DUPLICATE KEY UPDATE klassenavn = VALUES(klassenavn), studiumkode = VALUES(studiumkode)
");
$insK->execute(['IT1','IT og ledelse 1. år','ITLED']);
$insK->execute(['IT2','IT og ledelse 2. år','ITLED']);
$insK->execute(['IT3','IT og ledelse 3. år','ITLED']);

// Seed STUDENT
$insS = $pdo->prepare("
  INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
  VALUES (?, ?, ?, ?)
  ON DUPLICATE KEY UPDATE fornavn = VALUES(fornavn), etternavn = VALUES(etternavn), klassekode = VALUES(klassekode)
");
$insS->execute(['gb','Geir','Bjarvin','IT1']);
$insS->execute(['mrj','Marius R.','Johannessen','IT1']);
$insS->execute(['tb','Tove','Bøe','IT2']);

echo "Setup OK";
