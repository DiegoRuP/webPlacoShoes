<?php include 'navbar.php';

    $servidor='localhost';
    $cuenta='placoTest';
    $password='testPlacoPass';
    $bd='bdplacoshoes';

$conexion = new mysqli($servidor,$cuenta,$password,$bd);

$sql = 'select * from productos';
$resultado = $conexion -> query($sql);

// filtro de precio
$minPrecio = isset($_GET['precioMin']) ? $_GET['precioMin'] : 0;
$maxPrecio = isset($_GET['precioMax']) ? $_GET['precioMax'] : PHP_FLOAT_MAX;
$filtroGenero = isset($_GET['filtroGenero']) ? $_GET['filtroGenero'] : 'todos';
$sql2 = "SELECT * FROM productos WHERE (Categoria = '$filtroGenero' OR '$filtroGenero' = 'todos') AND Precio BETWEEN $minPrecio AND $maxPrecio";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <title>Catalogo - Placo Shoes</title>
</head>

<body>
    <br>
    <div class="contenedorCatalogo">

        <div class="imagen-contenedor" onclick="abrirImagen(this)">
            <img src="media/cuponTravis.png" alt="Imagen" class="imagen-thumbnail">
        </div>

        <div id="modalImg" class="modalImg" onclick="cerrarImagen(this)">
            <span class="cerrar-modal">&times;</span>
            <img class="modal-contenido" src="media/cuponTravis.png" alt="Imagen Ampliada">
        </div>

    <br>
        <h2>Catalogo - Placo Shoes</h2>
        <br>
        <div class="filtro">
                <label for="filtroGenero">Filtrar por categoria:</label>
                <select id="filtroGenero">
                    <option value="todos">Todos</option>
                    <option value="hombres">Hombres</option>
                    <option value="mujer">Mujeres</option>
                </select>

                <!-- filtro de precio -->
                <label for="precioMin">Precio mínimo: </label>
                <input type="number" id="precioMin" name="precioMin" min="0">

                <label for="precioMax">Precio máximo: </label>
                <input type="number" id="precioMax" name="precioMax" min="0">

                <button id="btnFiltro" onclick="filtrarPrecio()">Aplicar filtro de precio</button>
                <a href="catalogo.php"><button>Borrar filtro</button></a>
        </div>

        <script>
        document.getElementById('filtroGenero').addEventListener('change', function() {
            
            var filtro = this.value;
            var cartas = document.querySelectorAll('.itemCatalogo');

            cartas.forEach(function(carta) {
                carta.style.paddingLeft = '15';
                carta.style.display = 'block';
                var generoCarta = carta.querySelector('.desc').innerText.toLowerCase();
                
                if (filtro === 'todos' || generoCarta === filtro) {
                    carta.style.paddingLeft = '15';
                    carta.style.display = 'block';
                } else {
                    carta.style.display = 'none';
                }
            });
            
        });
    </script>
        <div class="container"> 
        <br>
        <div class="row">

    <?php
        $numPro = 0;
    ?>
    <script> var array=[];</script>


    <?php
        while( $fila = $resultado ->  fetch_assoc()){
            $id = $fila['ID'];
            $stock = $fila['Stock'];
            $descuento = $fila['Descuento'];
            $descripcion = $fila['Descripcion'];
            $imagen = $fila['Imagen'];
            $producto = $fila['Nombre'];
            $precio = $fila['Precio'];
            $categoria = $fila['Categoria'];
    ?>

    <script>
        array.push("<?php echo $producto ?>");
    
    </script>

    <div class="col-md-3 col-sm-6 itemCatalogo">
        <a >
            <img class="img-fluid" z-index="1"  width="250" height="250" src="media/<?php echo $imagen ?>">
        </a>
            <p id="catalogoIDP"><?php echo $id ?></p>
            <p id="catalogoStockP"> Stock: <?php echo $stock ?></p>

            <!-- ESTE DIV ES EL QUE SE VA A MOSTRAR SOLO SI EL DESCUENTO ES MAYOR A 0 -->
            <?php 

            if  ($stock == 0){
                echo '<div class="agotado">
                        <p id="agotadoP"> Agotado </p>
                    </div>';
            }

            elseif  ($descuento > 0){
                echo '<div class="descuento">
                        <p id="catalogoDescuentoP"> ' .$descuento .'% </p>
                    </div>';

            }

            ?>
            
        <p id="catalogoNombreP"><?php echo $producto ?></p>
        <p id="catalogoDescripcionP"><?php echo $descripcion ?></p>
        <div class="desc">
            <?php 
                echo $categoria;
            ?>
        </div>
        <?php

            if($descuento > 0 && $stock > 0){
                $descuentoProducto = $precio * $descuento / 100;

                $precioAnterior = $precio;

                $precio = $precioAnterior - $descuentoProducto;

                echo '<del>$' . $precioAnterior . '</del>';
            }

            ?>
        <p id="catalogoPrecioP">$<?php echo $precio ?></p>
        <a class="carritoCatalogo" >
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
    <br>

    

<?php
        $numPro = $numPro+1;
    }
?>

<script>
    console.log(array);    
    
    function agregar(id){
        var indice = parseInt(id);
        console.log(`Elegiste ${array[indice]}`);       
         
    }

    //FUNCION PARA ABRIR CUPON TRAVIS

    function abrirImagen(contenedor) {
    var modal = document.getElementById('modalImg');
    var modalContenido = document.querySelector('.modal-contenido');
    modalContenido.src = contenedor.querySelector('img').src;
    modal.style.display = 'flex';
    }

    function cerrarImagen(modal) {
        modal.style.display = 'none';
    }
    
</script>
        </div>
    </div>
</div>
<br>

<script src="js/validacion.js"></script>
</body>



</html>

<?php include 'footer.php'?>