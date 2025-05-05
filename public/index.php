<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use Controllers\AdminController;
use MVC\Router; 
$router = new Router();

// Main
$router->get('/', [AuthController::class, 'main']);
//$router->post('/', [AuthController::class, 'main']);

//Iniciar Sesión
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);

// Home
$router->get('/home', [AuthController::class, 'home']);
$router->get('/about-us', [AuthController::class, 'home']);

$router->get('/events', [AuthController::class, 'home']);

$router->get('/events/{id}', [AuthController::class, 'events']);

$router->get('/profile', [AuthController::class, 'home']);

// Recuperar contraseña
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

$router->get('/recuperar', [AuthController::class, 'recuperar']);
$router->post('/recuperar', [AuthController::class, 'recuperar']);

// Crear cuenta
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

$router->get('/mensaje', [AuthController::class, 'mensaje']);

// Terms of Service and Privacy Policy 
$router->get('/Terms-of-Service', [AuthController::class, 'terms']);

// -------------------------- ADMIN --------------------------

$router->get('/paneladmin', [AdminController::class, 'paneladmin']);

// Comprobando Rutas
$router->comprobarRutas();
?>
