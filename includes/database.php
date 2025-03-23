<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/libs/Medoo.php';
use Dotenv\Dotenv;
use Medoo\Medoo;

// Cargar el archivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    $db = new Medoo([
        'type' => 'mysql',
        'host' => $_ENV["DB_HOST"],
        'database' => $_ENV["DB_NAME"],
        'username' => $_ENV["DB_USER"],
        'password' => $_ENV["DB_PASSWORD"]
    ]);
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    die();
}

?>