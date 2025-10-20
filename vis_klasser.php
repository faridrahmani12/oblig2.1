<?php
require 'db.php';
$klasser = $pdo->query("SELECT klassekode, klassenavn, studiumkode FROM klasse ORDER BY klassekode")->fetchAll(PDO::FETCH_ASSOC);

// Print header
echo "klassekode klassenavn studiumkode\n";

foreach ($klasser as $k) {
    // Fjern linjeskift i feltene og vis nøyaktig format
    $kode = trim($k['klassekode']);
    $navn = trim($k['klassenavn']);
    $stud = trim($k['studiumkode']);
    echo "{$kode} {$navn} {$stud}\n";
}
?>
