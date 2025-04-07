<?php
// Database connection (Assuming this is inside a PHP file)
$dsn = "mysql:host=localhost;dbname=dbLab4";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL Query to retrieve data from the 'users' table
    $sql = "SELECT anime, studio, author, releaseDate, rating FROM users";
    $stmt = $pdo->query($sql);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
