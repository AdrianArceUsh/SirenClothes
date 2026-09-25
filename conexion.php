<?php
// 1. Reemplaza estos valores con las credenciales de la pestaña "Variables" de Railway
$host     = 'caboose.proxy.rlwy.net';              // Ejemplo: mysql.railway.internal o el host externo
$port     = '28144';                                // Ejemplo: 3306 o el puerto asignado
$db       = 'railway';                             // El nombre de la base de datos
$user     = 'root';                                // Generalmente 'root'
$password = 'VGVCtyRuuBgMwVaFlShIqiwyzvOhGLfn';    // La contraseña larga generada por Railway
$charset  = 'utf8mb4';

// 2. Configurar la cadena de conexión (DSN)
$
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    http_response_code(500);
    die(json_encode(["ok" => false, "error" => $e->getMessage()]));
}
?>