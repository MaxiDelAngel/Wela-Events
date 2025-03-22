<?php
require('../vendor/autoload.php');
require './libs/Medoo.php';
use Medoo\Medoo;
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// Initialize
$database = new Medoo([
    'type' => 'mysql',
    'host' => $_ENV["DB_HOST"],
    'database' => $_ENV["DB_NAME"],
    'username' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASSWORD"]
]);

// Test connection
try {
    echo "Connection successful!";
    $trial = $database->select("Users", "*");
    print_r($trial);
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>