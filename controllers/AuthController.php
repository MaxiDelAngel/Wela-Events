<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Usuario;

class AuthController {

    public static function main(Router $router) {
        $router->render('/main');
    }

    public static function login(Router $router) {
        $router->render('auth/login');
    }

    public static function logout() {
        echo 'Desde el logout';
    }

    public static function olvide() {
        echo 'Desde el olvide';
    }

    public static function recuperar() {
        echo 'Desde el recuperar';
    }

    public static function register(Router $router) {
        $usuario = new Usuario();

        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarRegister();
            
            if(empty($alertas)){
                // verificar si el usuario ya existe
                $resultado = $usuario->usuarioExistente();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear la contraseña
                    $usuario->hashPassword();
                    // Generar un token único
                    $usuario->crearToken();
                    // Enviar el email de confirmación
                    $email = new Email($usuario->nombre, $usuario->email,$usuario->token);

                    $email->enviarConfirmacion();
                }
            }
        }

        $router->render('auth/register', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    
    public static function terms() {
        echo 'Desde el terms';
    }

    public static function privacy() {
        echo 'Desde el privacy';
    }
}