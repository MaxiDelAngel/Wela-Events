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
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                $usuario = Usuario::where('email', $auth->email);
                $usuario = new Usuario($usuario);
                if($usuario) {
                    if($usuario->comprobarPassword($auth->password)){
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . ' ' . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['telefono'] = $usuario->telefono;
                        $_SESSION['login'] = true;

                        // Redireccionar al usuario
                        if($usuario->rol === 'ADMIN') {
                            $_SESSION['rol'] = 'ADMIN';
                            $redireccion = '/';
                        } else if($usuario->rol === 'ENCARGADO') {
                            $_SESSION['rol'] = 'ENCARGADO';
                            $redireccion = '/';
                        } else {
                            $_SESSION['rol'] = 'USER';
                            $redireccion = '/';
                        }

                        $loginExitoso = true;
                        Usuario::setAlerta('success', 'Has iniciado sesión correctamente.');
                    }
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas,
            'loginExitoso' => $loginExitoso,
            'redireccion' => $redireccion
        ]);
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

                    //Enviar el email de confirmación
                    $email = new Email($usuario->nombre, $usuario->email,$usuario->token);

                    $email->enviarConfirmacion();

                    //debuguear($usuario);

                    // Crear el usuario
                    $resultado = $usuario->guardar();
                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/register', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {
        $alertas = [];
    
        $token = s($_GET['token']);
    
        $usuario = Usuario::where('token', $token);
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            $usuario = new Usuario($usuario);
    
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('success', 'Cuenta confirmada correctamente');
        }

        $alertas = Usuario::getAlertas();
    
        $router->render('auth/confirmar-cuenta', [
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