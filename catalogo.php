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
        <div class="filtro">
            <label for="filtroGenero">Filtrar por género:</label>
            <select id="filtroGenero">
                <option value="todos">Todos</option>
                <option value="hombres">Hombres</option>
                <option value="mujer">Mujeres</option>
            </select>
        </div>
       <br>

    <script>
        document.getElementById('filtroGenero').addEventListener('change', function() {
            
            var filtro = this.value;
            var cartas = document.querySelectorAll('.itemCatalogo');

            cartas.forEach(function(carta) {
                carta.style.paddingLeft = '72';
                carta.style.display = 'block';
                var generoCarta = carta.querySelector('.desc').innerText.toLowerCase();
                
                if (filtro === 'todos' || generoCarta === filtro) {
                    carta.style.paddingLeft = '72';
                    carta.style.display = 'block';
                } else {
                    carta.style.display = 'none';
                }
            });
            
        });
    </script>
    <br>
        <div class="container"> <br><br>

            <div class="row">

    <?php
        $numPro = 0;
    ?>
    <script> var array=[];</script>


    <?php
        while( $fila = $resultado ->  fetch_assoc()){
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
        <p><?php echo $producto ?></p>
        <div class="desc">
            <?php 
                echo $categoria;
            ?>
        </div>
        <p>$<?php echo $precio ?></p>
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