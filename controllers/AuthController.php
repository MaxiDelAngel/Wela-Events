<?php

namespace Controllers;

use MVC\Router;

class AuthController {

    public static function main(Router $router) {
        $router->render('/main');
    }

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
    
    public static function terms() {
        echo 'Desde el terms';
    }

    public static function privacy() {
        echo 'Desde el privacy';
    }
}