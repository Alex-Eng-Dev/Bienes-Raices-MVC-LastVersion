<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require 'vendor/autoload.php';

class PaginasController {
    public static function index(Router $router) {
        
        $propiedades = Propiedad::getLimit(3);
        $start =true;
        
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'start' => $start
        ]);
    }

    public static function nosotros(Router $router) {
        

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::getAll();
        
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router) {
        $id = validarDireccionar('/propiedades');

        //Busca la propiedad por su id
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router) {
           
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router) {
        
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router) {

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST["contacto"];
            
            
           $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'cddd58388f900a';
        $mail->Password = '537c44a480afeb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Cambiado
        $mail->Port = 2525;

        // Remitente y destinatario
        $mail->setFrom('admin@bienesraices.com', 'Bienes Raices');
        $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');

        // Contenido
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Nuevo mensaje de contacto';
        $contenido = '<html>';
        $contenido .= '<p>tienes un nuevo mensaje</p>';
        $contenido .= '<p>Nombre: ' . $respuestas["nombre"] . ' </p>';
        
        //Enviar de forma condicional algunos campos de email o telefono
        if($respuestas["contacto"] === 'telefono'){
            $contenido .= '<p>Eligio ser contactado por teléfono: </p>';
            $contenido .= '<p>telefono: ' . $respuestas["telefono"] . ' </p>';
            $contenido .= '<p>fecha: ' . $respuestas["fecha"] . ' </p>';
            $contenido .= '<p>hora: ' . $respuestas["hora"] . ' </p>';
        }else{
            $contenido .= '<p>Eligio ser contactado por correo: </p>';
            $contenido .= '<p>correo: ' . $respuestas["email"] . ' </p>';
        }

        
        $contenido .= '<p>mensaje: ' . $respuestas["mensaje"] . ' </p>';
        $contenido .= '<p>opcion: ' . $respuestas["tipo"] . ' </p>';
        $contenido .= '<p>presupuesto: ' . $respuestas["precio"] . ' </p>';
        $contenido .= '<p>contactar por: ' . $respuestas["contacto"] . ' </p>';
       
        $contenido .= '</html>';
        $mail->Body = $contenido;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $mensaje = 'Mensaje enviado';
    } catch (Exception $e) {
        $mensaje = "Error: {$mail->ErrorInfo}";
    }

        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

}