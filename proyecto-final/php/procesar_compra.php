<?php
require '../config/config.php';

$usuario_id = 1; // Este valor será dinámico tras el login
$total = 100; // Calcular el total real de la compra

$productos = json_encode(["producto1" => 2, "producto2" => 1]); // Ejemplo de JSON con los productos

$stmt = $conn->prepare("INSERT INTO ventas (usuario_id, productos, total) VALUES (:usuario_id, :productos, :total)");
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->bindParam(':productos', $productos);
$stmt->bindParam(':total', $total);

try {
    $stmt->execute();
    echo "Compra procesada exitosamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
