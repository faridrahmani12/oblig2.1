<?php
require 'db.php';
$studenter = $pdo->query("SELECT * FROM student")->fetchAll();
foreach ($studenter as $s) {
    echo "{$s['brukernavn']} - {$s['fornavn']} {$s['etternavn']} ({$s['klassekode']}) 
    <a href='slett.php?type=student&kode={$s['brukernavn']}'>Slett</a><br>";
}

