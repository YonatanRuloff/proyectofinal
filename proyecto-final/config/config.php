<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "rulishop";
$username = "root";
$password = "yonatanruloff10";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
