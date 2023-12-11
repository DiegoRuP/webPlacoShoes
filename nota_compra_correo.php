<head><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="css/style.css"></head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['subtotal'])) {
        $subtotal = $_SESSION['subtotal'];
        // ... hacer lo mismo para las otras variables de sesión
    } else {
        echo "La variable de sesión 'subtotal' no está definida.";
        // Puedes redirigir o manejar el error de alguna otra manera
    }
    $user = $_SESSION['usuario'];
    $subtotal = $_SESSION['subtotal'];
    $cobroenvio = $_SESSION['cobroenvio'];
    $impuesto = $_SESSION['impuesto'];
    $totalPago = $_SESSION['totalpago'];
    $fpago = $_SESSION['forma_pago'];
    $address = $_SESSION['direccion'];
    $nombresArray = $_SESSION['arrayNombres'];
    $cantidad = $_SESSION["cantidad"];
    $cantidadArray = explode(",", $cantidad);

    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='bdplacoshoes';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    $sql = "SELECT Correo FROM usuarios WHERE Cuenta='$user'";
    $resultado = $conexion->query($sql);
    if ($resultado && $row = $resultado->fetch_assoc()) {
        $email = $row['Correo'];
    }
    $mail_body='Productos:';
    $i=0;
    foreach ($nombresArray as $nombre) {
        $sql = "SELECT Precio, Descuento FROM productos WHERE Nombre='$nombre'";
        $resultado = $conexion->query($sql);
                                    
        if ($resultado && $row = $resultado->fetch_assoc()) {
            $precio = $row['Precio'];
            $descuento = $row['Descuento'];
            if ($descuento > 0) {
                $precioConDescuento = $precio - ($precio * ($descuento / 100));
                $mail_body .= '<li>'.$cantidadArray[$i].' - '. $nombre . ' - ' . number_format($precioConDescuento, 2) . '</li>';
            } else {
                $mail_body .= '<li>'.$cantidadArray[$i].' - ' . $nombre . ' - ' . number_format($precio, 2) . '</li>';
            }
        }
        $i++;
    }

    // Continúa acumulando los demás datos al cuerpo del correo
    $mail_body .= '<li>Subtotal: ' . number_format($subtotal, 2) . '</li>';
    $mail_body .= '<li>Cobro por envio: ' . number_format($cobroenvio, 2) . '</li>';
    $mail_body .= '<li>Impuesto: ' . number_format($impuesto, 2) . '</li>';
    $mail_body .= '<li>TOTAL A PAGAR: ' . number_format($totalPago, 2) . '</li>';
    $mail_body .= '<li>Metodo de pago: ' . $fpago . '</li>';
    $mail_body .= '<li>Direccion de envio: ' . $address . '</li>';

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
        $mail->addAddress($email,$user);

        // Asunto y cuerpo del correo


        //Se implementan imágenes dentro del cuerpo del correo
        $mail->addEmbeddedImage('media/logoAzul.png', 'logoPlaco');

        // Cuerpo de correo
        $mail->isHTML(true);
            //Mensaje en correo
        $subject = "¡SE HA REALIZADO TU COMPRA CON EXITO! | Placo-Shoes";
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
                    <h2>¡Hola ' . $user . '!</h2>
                    <p>Te enviamos tu informacion de compra, para que te cerciores de que todo este en placo-orden, porque nos interesa la integridad de los datos y de las compras de nuestros placo-clientes mas fieles.</p>
                    <p>Ante cualquier duda, envianos un correo al mismo de este mensaje.</p>
                    <p>A continuación, un desgloce de los datos de tu compra:</p>
                                <ol>
                                    <h3>TICKET DE COMPRA:</h3>
                                    <h4>Desgloce</h4>
                                        <ul>'
                                            .$mail_body. 
                                        '</ul>
                    <p>¡Tennis Chidos Para Gente Chida, recuerdalo y no lo olvides!</p>
                                <p>PlacoSaludos :)</p>
                                <p>PlacoInc</p>
                </div>
            </body>
            </html>';
      
            if ($mail->send()) {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡Bien!",
                            text: "Revisa tu correo para obtener el desgloce de compra.",
                            confirmButtonText: "Aceptar"
                        }).then(function() {
                            window.location = "mostrarpdf.php";
                        });
                    </script>';
                exit();
            } else {

                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Hubo un problema al enviar el correo. No se ha encontrado la direccion de correo para el envio.",
                            confirmButtonText: "Aceptar"
                        }).then(function() {
                            window.location = "principal.php";
                        });
                    </script>';
            }
include 'footer.php'; 
    ?>
</body>

    