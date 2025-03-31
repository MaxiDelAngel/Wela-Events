<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use MVC\Router; 
$router = new Router();

// Main
$router->get('/', [AuthController::class, 'main']);
//$router->post('/', [AuthController::class, 'main']);

//Iniciar Sesión
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// Recuperar contraseña
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);
$router->get('/recuperar', [AuthController::class, 'recuperar']);
$router->post('/recuperar', [AuthController::class, 'recuperar']);

// Crear cuenta
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);

// Terms of Service and Privacy Policy 
$router->get('/Terms-of-Service', [AuthController::class, 'terms']);
//$router->get('/Privacy-Policy', [AuthController::class, 'privacy']);

// Comprobando Rutas
$router->comprobarRutas();
?>
