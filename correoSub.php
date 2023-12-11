<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f646e31ace.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];

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
$mail->addAddress($email, $nombre);

//Se implementan imágenes dentro del cuerpo del correo
$mail->addEmbeddedImage('media/logoAzul.png', 'logoPlaco');

$mail->addEmbeddedImage('media/cuponBoletin.jpg', 'cuponSub');

// Cuerpo de correo
$mail->isHTML(true);
    //Mensaje en correo
$subject = " ¡Bienvenido a los miembros de Placo-Shoes!";
$mail->Subject = $subject;
$mail->Body = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #0DB8DE;
                color: #0DB8DE;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                color: #0DB8DE;
                background-color: #1A2226;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="cid:logoPlaco" alt="logoPlacoShoes" width="200px" height="200px" style="margin-left: 32%;">
            <h2>¡Hola ' . $nombre . '!</h2>
            <p>Gracias por formar parte de los miembros suscriptores de Placo Shoes, mantente atento para recibir nuestras ofertas</p>
            <p>Estamos encantados de atender las peticiones de nuestros clientes y gracias a tu suscripcion te queremos agradecer con el siguiente cupón</p>

            <img src="cid:cuponSub" alt="cuponSub" width="400px">
            
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
                    window.location = "principal.php";
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
                    window.location = "principal.php";
                });
              </script>';
    }
    
?>

</body>
</html>