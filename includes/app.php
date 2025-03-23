<?php

require __DIR__ . '/database.php';
require __DIR__ . '/funciones.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectarnos a la base de datos

use Model\ActiveRecord;
ActiveRecord::setDB($db);
?>