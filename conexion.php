<?php
// 1. Reemplaza estos valores con las credenciales de la pestaña "Variables" de Railway
$host     = 'mysql.railway.internal';        // Ejemplo: mysql.railway.internal o el host externo
$port     = '3306';        // Ejemplo: 3306 o el puerto asignado
$db       = 'railway';    // El nombre de la base de datos
$user     = 'root';        // Generalmente 'root'
$password = 'VGVCtyRuuBgMwVaFlShIqiwyzvOhGLfn';    // La contraseña larga generada por Railway
$charset  = 'utf8mb4';

// 2. Configurar la cadena de conexión (DSN)
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

// 3. Opciones de configuración para mayor seguridad y control de errores
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanza excepciones si hay errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devuelve los datos como array asociativo
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Desactiva la emulación para prevenir inyección SQL
];

try {
    // 4. Intentar conectar
    $pdo = new PDO($dsn, $user, $password, $options);
    // Puedes descomentar la siguiente línea para probar de forma local si conecta:
    // echo "¡Conexión exitosa a MySQL en Railway!"; 
} catch (\PDOException $e) {
    // Si falla, detiene la ejecución y muestra el error (ideal para desarrollo)
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
