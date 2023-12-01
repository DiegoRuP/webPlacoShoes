<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="media/logo.ico">
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
    <header class="headerNav">

                <ul class="listaNav">
                    <li>
                        <a href="principal.php"> Inicio </a>
                    </li>                
                    <li>
                        <a href="catalogo.php"> Tienda </a>
                    </li>                
                    <li>
                        <a href="nosotros.php"> Acerca de </a>
                    </li>   
                    <li>
                        <a href="contacto.php"> Contacto </a>
                    </li>                 
                    <li>
                        <a href="ayuda.php"> Ayuda </a>
                    </li>     
                    <li>
                        <a href="formproducto.php"> Admin </a>
                    </li>          
                </ul>
    
    </header>

</div>

