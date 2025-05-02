<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {
        
        // Proteger Rutas...
        session_start();

        // Arreglo de rutas protegidas...
        // $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        // $auth = $_SESSION['login'] ?? null;

        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
            $routes = $this->getRoutes;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
            $routes = $this->postRoutes;
        }

        // Funcionalidad para renderizar rutas dinámicas
        foreach ($routes as $route => $fn) {
            $pattern = preg_replace("#\{\w+\}#", "([^\/]+)", $route);

            if (preg_match("#^$pattern$#", $currentUrl, $matches)) {
                array_shift($matches);
                array_unshift($matches, $this);
                call_user_func_array($fn, $matches);
                return;
            }
        }
        echo "Página No Encontrada o Ruta no válida";

        // if ( $fn ) {
        //     // Call user fn va a llamar una función cuando no sabemos cual sera
        //     call_user_func($fn, $this); // This es para pasar argumentos
        // } else {
        //     echo "Página No Encontrada o Ruta no válida";
        // }
    }

    public function render($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}
