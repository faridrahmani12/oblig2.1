<?php
$hosts = ["mysql", "mysql.internal", "mysql-farah6535", "db", "localhost"];
$user = "farah6535";
$pass = "a999farah6535";
$dbname = "farah6535";

foreach ($hosts as $h) {
    echo "<h3>Tester host: $h</h3>";
    try {
        $db = @new mysqli($h, $user, $pass, $dbname);
        if ($db->connect_errno) {
            echo "❌ Feil: " . $db->connect_error . "<br>";
        } else {
            echo "✅ TILKOBLET! Host: $h<br>";
            $db->close();
        }
    } catch (Throwable $e) {
        echo "⚠️ Exception: " . $e->getMessage() . "<br>";
    }
}
?>
