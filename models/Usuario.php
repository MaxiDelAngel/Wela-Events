<?php

namespace Model;

use Classes\Email;
use PHPMailer\PHPMailer\PHPMailer;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'TBL_WELA_USUARIOS';
    protected static $columnasDB = ['ID', 'NOMBRE', 'APELLIDO', 'EMAIL', 'TELEFONO', 'PASSWORD', 'TOKEN'];

    // Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $password;
    public $token;

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['ID'] ?? null;
        $this->nombre = $args['NOMBRE'] ?? '';
        $this->apellido = $args['APELLIDO'] ?? '';
        $this->email = $args['EMAIL'] ?? '';
        $this->telefono = $args['TELEFONO'] ?? '';
        $this->password = $args['PASSWORD'] ?? '';
        $this->token = $args['TOKEN'] ?? null;
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

    // Enviar el email de confirmación
    public function enviarConfirmacion() {
        //Crear ek objeto de email
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io'; 
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = 'f186413080ec70';
        $email->Password = '****38ec';
    }
}

