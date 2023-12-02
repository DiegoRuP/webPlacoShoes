<?php
    session_start();

    // Creamos una imagen en blanco
    $imagen = imagecreatetruecolor(150, 50);

    // Colores
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);

    // Rellenamos el fondo de la imagen con color blanco
    imagefilledrectangle($imagen, 0, 0, 150, 50, $blanco);
    
    function randomText($length){
        $key="";
        $parametros="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0;$i<$length;$i++){
            $key.=$parametros[rand(0,61)];
        }
        return $key;
    }
    // Generamos una cadena aleatoria de 6 caracteres
    $captcha_texto = randomText(6);

    // Guardamos el texto del CAPTCHA en una variable de sesión para verificar después
    $_SESSION['captcha_texto'] = $captcha_texto;

    // Agregamos el texto al CAPTCHA con fuente aleatoria, inclinación y distorsión
    for ($i = 0; $i < 6; $i++) {
        $fuente = rand(3, 5); // Seleccionamos una fuente aleatoria
        $caracter = substr($captcha_texto, $i, 1);
        $angulo = rand(-30, 30); // Ángulo aleatorio

        imagettftext($imagen, 20, $angulo, 20 + ($i * 20), 35, $negro, 'ARIAL.TTF', $caracter);
    }

    // Aplicamos distorsión a la imagen
    imagefilter($imagen, IMG_FILTER_SMOOTH, 10);

    // Mostramos la imagen como un CAPTCHA
    header("Content-type: image/png");
    imagepng($imagen);

    // Liberamos la memoria
    imagedestroy($imagen);
?>

