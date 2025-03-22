<?php
require 'vendor\autoload.php';
require 'src\libs\Medoo.php';
use Medoo\Medoo;

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