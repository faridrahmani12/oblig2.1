<?php
require 'db.php';

if ($_GET['type'] === 'klasse') {
    $stmt = $pdo->prepare("DELETE FROM klasse WHERE klassekode=?");
    $stmt->execute([$_GET['kode']]);
    echo "Klasse slettet!";
}

if ($_GET['type'] === 'student') {
    $stmt = $pdo->prepare("DELETE FROM student WHERE brukernavn=?");
    $stmt->execute([$_GET['kode']]);
    echo "Student slettet!";
}

