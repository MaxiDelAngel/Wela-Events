<?php
namespace Model;

use Medoo\Medoo;

class ActiveRecord {

    // Base de datos
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    // Definir la conexión a la BD
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query)->fetchAll();

        // Iterar los resultados y crear los objetos
        $array = [];
        foreach ($resultado as $registro) {
            $array[] = static::crearObjeto($registro);
        }

        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->quote($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Registros - CRUD
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // Actualizar
            $resultado = $this->actualizar();
        } else {
            // Crear un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Todos los registros
    public static function all() {
        return self::$db->select(static::$tabla, '*');
    }

    // Buscar un registro por su ID
    public static function find($id) {
        return self::$db->get(static::$tabla, '*', ['id' => $id]);
    }

    // Obtener registros con cierto límite
    public static function get($limite) {
        return self::$db->select(static::$tabla, '*', ['LIMIT' => $limite]);
    }

    // Crear un nuevo registro
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $id = self::$db->insert(static::$tabla, $atributos);

        return [
            'resultado' => $id ? true : false,
            'id' => $id
        ];
    }

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Actualizar en la base de datos
        $resultado = self::$db->update(static::$tabla, $atributos, ['id' => $this->id]);

        return $resultado;
    }

    // Eliminar un registro por su ID
    public function eliminar() {
        $resultado = self::$db->delete(static::$tabla, ['id' => $this->id]);
        return $resultado;
    }
}
