<?php

require 'database.php';
require 'functions.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/libs/Medoo.php';

// Conectarnos a la base de datos

use Model\ActiveRecord;
ActiveRecord::setDB($db);
?>