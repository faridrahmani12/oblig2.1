<?php
require 'db.php';
$klasser = $pdo->query("SELECT * FROM klasse")->fetchAll();
foreach ($klasser as $k) {
    echo "{$k['klassekode']} - {$k['klassenavn']} ({$k['studiumkode']}) 
    <a href='slett.php?type=klasse&kode={$k['klassekode']}'>Slett</a><br>";
}

