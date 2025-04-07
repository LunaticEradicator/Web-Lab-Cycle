<?php
$dsn = "mysql:host=localhost;dbname=dbLab4";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // accept error mode and accepting
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}
