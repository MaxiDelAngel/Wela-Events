<?php

namespace Model;

use Classes\Email;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'TBL_WELA_USUARIOS';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'telefono', 'password', 'rol', 'token', 'confirmado'];

    // Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $password;
    public $rol;
    public $token;
    public $confirmado;

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? $args['ID'] ?? null;
        $this->nombre = $args['nombre'] ?? $args['NOMBRE'] ?? '';
        $this->apellido = $args['apellido'] ?? $args['APELLIDO'] ?? '';
        $this->email = $args['email'] ?? $args['EMAIL'] ?? '';
        $this->telefono = $args['telefono'] ?? $args['TELEFONO'] ?? '';
        $this->password = $args['password'] ?? $args['PASSWORD'] ?? '';
        $this->rol = $args['rol'] ?? $args['ROL'] ?? 'USUARIO';
        $this->token = $args['token'] ?? $args['TOKEN'] ?? null;
        $this->confirmado = $args['confirmado'] ?? $args['CONFIRMADO'] ?? 0;
    }

    // Validaciones
    public function validarRegister() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Validar el login
    public function validarLogin(){
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        return self::$alertas;
    }
    
    public function validarEmail(){
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }
    
    public function validarPassword(){
        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }
    
    // Validar si el usuario ya existe
    public function usuarioExistente() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE EMAIL = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya existe';
        }
        return $resultado;
    }

    // Hashear la contraseña
    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Crear un token único
    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPassword($password) {
        $resultado = password_verify($password, $this->password);
        
        if(!$this->confirmado) {
            self::$alertas['error'][] = 'El usuario no ha sido confirmado';
        } else if(!$resultado) {
            self::$alertas['error'][] = 'La contraseña es incorrecta';
        } else {
            return true;
        }
    }
}

