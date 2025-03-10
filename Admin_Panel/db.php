<?php
$host = "localhost";
$dbname = "admin_panel"; // Your database name
$username = "root"; // Default username in Laragon
$password = ""; // Default password in Laragon (empty)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
