<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "cliente";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOexception $e) {
    echo "Error: " . $e->getMessage();
}
?>