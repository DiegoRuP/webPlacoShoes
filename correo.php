<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f646e31ace.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$tel = $_POST['telefono'];
$msj = $_POST['mensaje'];

$nombre_completo = $nombre . " " . $apellidos ;

// Envía un correo electrónico personalizado
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Crea una instancia de PHPMailer
$mail = new PHPMailer;

// Configura el uso de SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'correodiegoxampp@gmail.com';
$mail->Password = 'cqle accj ulom ahzt';
$mail->SMTPSecure = 'tls'; // Puedes usar 'ssl' en lugar de 'tls' si prefieres SSL
$mail->Port = 587;

// Configura los remitentes y destinatarios
$mail->setFrom('correodiegoxampp@gmail.com', 'Equipo Placo-Shoes');
$mail->addAddress($email, $nombre_completo);

// Asunto y cuerpo del correo


//Se implementan imágenes dentro del cuerpo del correo
$mail->addEmbeddedImage('media/logoAzul.png', 'logoPlaco');

// Cuerpo de correo
$mail->isHTML(true);
    //Mensaje en correo
$subject = "¡Tu solicitud esta siendo procesada! Placo-Shoes";
$mail->Subject = $subject;
$mail->Body = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                color: #000000;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #EEEEEE;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="cid:logoPlaco" alt="logoPlacoShoes" width="200px" height="200px" style="margin-left: 32%;">
            <h2>¡Hola ' . $nombre . '!</h2>
            <p>En seguida procesaremos tu solicitud y nos pondremos en contacto contigo, estate atento a tu bandeja de entrada.</p>
            <p>Estamos encantados de atender las peticiones de nuestros clientes, si tienes alguna otra duda no dudes en contactarnos.</p>
            <p>A continuación, un repaso de los datos que recibimos:</p>
                        <ol>
                            <h3>Datos:</h3>
                                <ul>
                                    <li>Nombre:'. $nombre .' </li>
                                    <li>Apellidos: '.$apellidos.'</li>
                                    <li>Telefono: '.$tel.' </li>
                                    <li>Mensaje: '.$msj.'</li>
                                </ul>
            <p>Tennis Chidos Para Gente Chida</p>
                        <p>PlacoSaludos :)</p>
                        <p>PlacoInc</p>
        </div>
    </body>
    </html>';

    if ($mail->send()) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Bienvenido a Placo-Shoes!",
                    text: "Revisa tu correo para obtener tu cupón.",
                    confirmButtonText: "Aceptar"
                }).then(function() {
                    window.location = "contacto.php";
                });
              </script>';
        exit();
    } else {

        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Hubo un problema al enviar el correo. No has agregado direccion valida.",
                    confirmButtonText: "Aceptar"
                }).then(function() {
                    window.location = "contacto.php";
                });
              </script>';
    }
    
?>