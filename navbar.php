<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="media/logo.ico">
    <script src="https://kit.fontawesome.com/f646e31ace.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</head>

<body>
<div class="contenedorNav">
    
    <div class="opcionesTopNav">

        <div class="logoNav"> 
            <a href="index.php"><img src="media/logoAzul.png" alt="PlacoLogo"></a>
        </div>

        <ul class="listaNav">            
                

                <?php
                if (isset($_SESSION['usuario'])) {
                    //SI LA SESION DEL USUARIO ESTÁ ACTIVA MUESTRA EL NOMBRE Y HABILITA EL CARRITO 
                    //(Se puede utilizar también para habilitar las opciones del admin de control de base de datos)
                    echo '
                    
                    <li>
                        <span> Tenis chidos, actitud chida, para gente chida como '. $_SESSION['usuario'].'</span>
                    </li> 

                
                    
                    <li class="micuentaNav">
                    <a href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión </a>
                    </li>    
                    
                    <!-- CARRITO SOLO CON INICIO DE SESIÓN -->
                    <li class="carrito-hover">
                        

                        <div class="iconoCarrito">
                            <a><i class="fa-solid fa-cart-shopping"></i> Carrito </a>
                        </div>

                        <div class="contenedorCarrito">
                            
                            <div class="contadorProductos">
                                <span id="contador"> 0 </span>
                            </div>
                            
                            <div class="productosCarrito ocultarCarrito">
                                
                                <div class="row-product">
                                    <div class="itemCarrito">   <!-- cart-product -->
                                        <div class="infoCarrito">  <!-- info-cart-product -->
                                            <span class="cantItem"></span>
                                            <p class="tituloItem">Carrito Vacio</p>
                                            <p class="precioItem"></p>
                                        </div>                  
                                    </div>
                                </div>    

                                <div class="totalCarrito">
                                        <h3>Total:</h3>
                                        <span class="totalPago">$0</span>
                                </div>
                            </div>
                        </div>   
                    </li>';

                } else {
                    
                    echo ' <li>
                    <span> Tenis chidos, actitud chida, para gente chida</span>
                     </li>
                    
                    
                    <li class="micuentaNav">
                        <a href="login.php"> <i class="fa-solid fa-user"></i> Mi cuenta </a>
                    </li>                   
                    <li>
                        <!--Carrito desactivado si no tiene sesión-->
                        <a href=# onclick="validarCarrito()"> <i class="fa-solid fa-cart-shopping"></i> Carrito </a>
                        
                    </li>   ';
                }
            ?>    
            
         </ul> 
    
    </div>
    <header class="headerNav">

                <ul class="listaNav">
                    <li>
                        <a href="index.php"> Inicio </a>
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
                    
                    <?php if (isset($_SESSION['usuario'])) {

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "bdplacoshoes";

                        $conn = new mysqli($servername, $username, $password, $database);
                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }
                        $user = $_SESSION['usuario'];
                        $campo = "Admin";

                        $sql = "SELECT $campo FROM usuarios WHERE Cuenta = '$user'";
                        $resultado = $conn->query($sql);

                        if ($resultado) {
                            if ($resultado->num_rows > 0) {
                                $fila = $resultado->fetch_assoc();
                                $valorAdmin = $fila[$campo];

                                if ($valorAdmin == 1) {
                                    echo "
                                    <li>
                                        <a href='formproducto.php'> Admin </a>
                                    </li>
                                    <li>
                                        <a href='graficas.php'> Graficas </a>
                                    </li>";
                                }
                            }
                        } else {
                            echo "Error en la consulta: " . $conn->error;
                        }
                    }?>
                </ul>
    
    </header>
    

</div>

<script src="js/carrito.js"></script>
<script src="js/validacion.js"></script>

</body>



