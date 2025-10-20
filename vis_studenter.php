<?php
require 'db.php';
$studenter = $pdo->query("SELECT brukernavn, fornavn, etternavn, klassekode FROM student ORDER BY brukernavn")->fetchAll(PDO::FETCH_ASSOC);

// Print header
echo "brukernavn fornavn etterrnavn klassekode\n";

foreach ($studenter as $s) {
    $bn = trim($s['brukernavn']);
    $fn = trim($s['fornavn']);
    $en = trim($s['etternavn']);
    $kk = trim($s['klassekode']);
    echo "{$bn} {$fn} {$en} {$kk}\n";
}
?>
