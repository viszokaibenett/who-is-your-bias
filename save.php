<?php
session_start();
require 'db.php';

if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["selected_image"])) {
    $image_id = $_POST["selected_image"];

    $stmt = $pdo->prepare("INSERT INTO selection (id, image_id) VALUES (1, ?) 
        ON DUPLICATE KEY UPDATE image_id = VALUES(image_id)");
    $stmt->execute([$image_id]);
}

header("Location: dashboard.php");
exit();