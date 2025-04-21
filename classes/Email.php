<?php
namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        //Crear el objeto de email
        $email = new PHPMailer();

        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io'; 
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = 'b608dacb897753';
        $email->Password = '19bbb487b17f77';

        $email->setFrom('max@eligio.com');
        $email->addAddress('max@eligio', 'MaxEligio.com');
        $email->Subject = 'Confirma tu cuenta';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>, has creado tu cuenta en Wela, solo debes confirmarla haciendo click en el siguiente enlace:</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta</a></p>";
        $contenido .= "<p>Si no solicitaste esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $email->Body = $contenido;
    }
}
?>