<?php

namespace Controllers;

use MVC\Router;

class AuthController {
    public static function login() {
        echo 'Desde el Login';
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
        $router->render('auth/register');
    }
}