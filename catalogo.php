<?php include 'navbar.php';

$servidor='localhost';
$cuenta='root';
$password='';
$bd='bdplacoshoes';

$conexion = new mysqli($servidor,$cuenta,$password,$bd);

$sql = 'select * from productos';
$resultado = $conexion -> query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Catalogo - Placo Shoes</title>
</head>
<body>
    <br>
    <div class="contenedorCatalogo">
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
        <a href="#">
            <img class="img-fluid" width="250" height="250" src="media/<?php echo $imagen ?>">
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
        <p id="catalogoPrecioP">$<?php echo $precio ?></p>
        <a href="" class="carritoCatalogo" ><i class="fa-solid fa-cart-shopping"></i></a>
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
    
</script>
        </div>
    </div>
</div>
<br>
</body>


</html>

<?php include 'footer.php'?>