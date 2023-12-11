<?php
    include 'navbar.php';
    // Variables para controlar la validación
    $band = false;
    $error = '';

    // Generación del CAPTCHA
    //creamos una imagen vacia
    $imagen = imagecreatetruecolor(150, 50);
    //definimos dos colores, uno para el fondo y otro para las letras
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);
    //se pinta la imagen con un color creado
    imagefilledrectangle($imagen, 0, 0, 150, 50, $blanco);
    //se crea un texto aleatorio
    function randomText($length){
        $key="";
        $parametros="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0;$i<$length;$i++){
            $key.=$parametros[rand(0,61)];
        }
        return $key;
    }
    //se iguala una variable con el texto aleatorio
    $captcha_texto = randomText(6);
    $font = realpath("/var/www/html/ARIAL.TTF");
    //se guarda el valor del captcha en la variable de session global
    $_SESSION['captcha_texto']=$captcha_texto;
    //aqui se da valores aleatorios a el angulo, tamano de fuente, de uno en uno de los 6 caracteres.
    for ($i = 0; $i < 6; $i++) {
        $fuente = rand(3, 5);
        $caracter = substr($captcha_texto, $i, 1);
        $angulo = rand(-30, 30);

        //se van agregando cada uno de los caracteres que conforman el captcha a la imagen creada
        imagettftext($imagen, 20, $angulo, 20 + ($i * 20), 35, $negro, $font, $caracter);
    }
    //se agrega un filtro a la imagen
    imagefilter($imagen, IMG_FILTER_SMOOTH, 10);
    //se crea un archivo temporal de la imagen del captcha
    $ImagenCaptcha = 'captcha_temp.png';
    //se cambia el nombre a la imagen
    imagepng($imagen, $ImagenCaptcha);
    //se destruye la imagen para no ocupar espacio en memoria
    imagedestroy($imagen);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <br>
    <br><br><br><br>
    <div class="loginBody">
    <div class="form">
        <h2>¿No eres un robot?</h2>
        <!-- Se muestra la imagen del captcha -->
        <img class="imagen-captcha" src="<?php echo $ImagenCaptcha; ?>" alt="CAPTCHA">
        <!-- Formulario para introducir el texto del captcha -->
        <form id="captchaForm" class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" id="captchaUsuario" name="captchaUsuario" placeholder="Introduzca el texto generado en la imagen" required>
            <input type="text" id="captchaGenerado" name="captchaGenerado" value="<?php echo $_SESSION['captcha_texto']; ?>" hidden>
            <input class="btn" type="submit" value="VALIDAR CAPTCHA"></button>
        </form> <!-- en esta parte solo funciona la sweet alert cuando no se introduce ningun valor en el input, pero si se pone valor,
                     este o no bien salta una alerta pero no dura nada de tiempo.
                    cuando entre bien el usuario no se a donde saltar desde este php, queda pendiente jiji-->
    </div>
    </div>
    <script src="js/mensajeCaptcha.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<br><br><br><br><br>
<?php include 'footer.php'?>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores de los campos de texto
    $captchaUsuario = $_POST["captchaUsuario"];
    $captchaGenerado = $_POST["captchaGenerado"];

    if($captchaUsuario == $captchaGenerado){
        
        $_SESSION["usuario"] = $_SESSION["usernav"];
        echo "
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Inicio de Sesión Exitoso'
        }).then(function() {
            window.location.href='index.php';
        });
        </script>";        


    exit;
    }else{
        echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Captcha Incorrecto'
                    }).then(function() {
                        window.location.href='captcha.php';
                    });
                 </script>";

    }
}

?>