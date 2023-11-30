<?php session_start(); ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f646e31ace.js" crossorigin="anonymous"></script>
</head>

<div class="contenedorNav">
    
    <div class="opcionesTopNav">

        <div class="logoNav"> 
            <a href=""><img src="media/logoAzul.png" alt="PlacoLogo"></a>
        </div>

              
        <ul class="listaNav">            
            <li>
                <span> Tenis chidos, actitud chida, para gente chida </span>
            </li>        
            
            <?php

            if (isset($_SESSION['usuario'])) {
                //SI LA SESION DEL USUARIO ESTÁ ACTIVA MUESTRA EL NOMBRE Y HABILITA EL CARRITO 
                //(Se puede utilizar también para habilitar las opciones del admin de control de base de datos)
                echo '
                
                <span>
                        Bienvenido, ' . $_SESSION['usuario'] . '
                </span>
                
                <li class="micuentaNav">
                    <a href=""> <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión </a>
                </li>                   
                <li>
                    <a href=""> <i class="fa-solid fa-cart-shopping"></i> Carrito </a>
                </li>   ';

            } else {
                echo '
                <li class="micuentaNav">
                    <a href="login.php"> <i class="fa-solid fa-user"></i> Mi cuenta </a>
                </li>                   
                <li>
                    <!--Carrito desactivado si no tiene sesión-->
                    <a href="" class="desactivado"> <i class="fa-solid fa-cart-shopping"></i> Carrito </a>
                </li>   ';
            }
            ?>
                  
         </ul> 
    
    </div>
    <header class="header">

                <ul class="listaNav">
                    <li>
                        <a href=""> Inicio </a>
                    </li>                
                    <li>
                        <a href=""> Tienda </a>
                    </li>                
                    <li>
                        <a href=""> Acerca de </a>
                    </li>   
                    <li>
                        <a href=""> Contacto </a>
                    </li>                 
                    <li>
                        <a href=""> Ayuda </a>
                    </li>            
                </ul>
    
    </header>

</div>



</html>
