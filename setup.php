<?php
require_once __DIR__ . '/db.php';

// Opprett tabeller
$sql1 = "CREATE TABLE IF NOT EXISTS klasse (
  klassekode CHAR(5) NOT NULL,
  klassenavn VARCHAR(100) NOT NULL,
  studiumkode VARCHAR(50) NOT NULL,
  PRIMARY KEY (klassekode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$sql2 = "CREATE TABLE IF NOT EXISTS student (
  brukernavn CHAR(10) NOT NULL,
  fornavn VARCHAR(100) NOT NULL,
  etternavn VARCHAR(100) NOT NULL,
  klassekode CHAR(5) NOT NULL,
  PRIMARY KEY (brukernavn),
  CONSTRAINT fk_student_klasse FOREIGN KEY (klassekode) REFERENCES klasse(klassekode)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db->query($sql1);
$db->query($sql2);

// Seed data (idempotent)
$k = $db->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode)
                   VALUES (?,?,?)
                   ON DUPLICATE KEY UPDATE klassenavn=VALUES(klassenavn), studiumkode=VALUES(studiumkode)");
$k->bind_param("sss", $kode, $navn, $stud);

$rowsK = [
  ["IT1","IT og ledelse 1. år","ITLED"],
  ["IT2","IT og ledelse 2. år","ITLED"],
  ["IT3","IT og ledelse 3. år","ITLED"],
];
foreach ($rowsK as $r) { [$kode,$navn,$stud] = $r; $k->execute(); }
$k->close();

$s = $db->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
                   VALUES (?,?,?,?)
                   ON DUPLICATE KEY UPDATE fornavn=VALUES(fornavn), etternavn=VALUES(etternavn), klassekode=VALUES(klassekode)");
$s->bind_param("ssss", $bn, $fn, $en, $kk);

$rowsS = [
  ["gb","Geir","Bjarvin","IT1"],
  ["mrj","Marius R.","Johannessen","IT1"],
  ["tb","Tove","Bøe","IT2"],
];
foreach ($rowsS as $r) { [$bn,$fn,$en,$kk] = $r; $s->execute(); }
$s->close();

echo "Setup OK";

