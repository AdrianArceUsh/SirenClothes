<?php
require_once 'conexion.php';

try {
    // Seleccionamos los campos específicos de tu tabla 'stock'
    $stmt = $pdo->query("SELECT codigo, descripcion, precio, imagen, tipo FROM stock");
    $productos = $stmt->fetchAll();
    
    header('Content-Type: application/json');
    echo json_encode($productos);
} catch (\PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(["error" => $e->getMessage()]);
}
?>