<?php
require_once 'conexion.php';

// Capturamos los campos exactos enviados desde el JS
$codigo      = $_POST['codigo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$precio      = $_POST['precio'] ?? 0;
$tipo        = $_POST['tipo'] ?? '';
$nombre_imagen = null;

// Procesamos el archivo de la imagen si fue enviado
if (isset($_FILES['imagen'])) {
    $nombre_imagen = $_FILES['imagen']['name'];
    // Lógica para guardar el archivo en la carpeta del servidor
    $ruta_destino = "imagenes/" . $nombre_imagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino);
}

try {
    // El campo 'id' no lo ponemos porque suele ser AUTO_INCREMENT en MySQL
    $sql = "INSERT INTO stock (codigo, descripcion, precio, imagen, tipo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$codigo, $descripcion, $precio, $nombre_imagen, $tipo]);
    
    header('Content-Type: application/json');
    echo json_encode(["success" => true]);
} catch (\PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
