<?php
require 'src/libs/Medoo.php';
use Medoo\Medoo;

// Initialize
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'your_database_name',
    'username' => 'your_username',
    'password' => 'your_pzassword'
]);

// Test connection
try {
    $database->query("SELECT 1");
    echo "Connection successful!";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>