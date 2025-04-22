<?php
$host = "localhost";
$dbname = "who-is-your-bias";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}
?>