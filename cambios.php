<?php 
    include 'navbar.php';
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='bdplacoshoes';
     
    $_SESSION['id'] = '';
    $_SESSION['nom'] = '';
    $_SESSION['desc'] = '';
    $_SESSION['stock'] = '';
    $_SESSION['precio'] = '';
    $_SESSION['descuen'] = '';
    $_SESSION['imagen'] = '';
    $_SESSION['categ'] = '';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    
    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    if(isset($_POST['cambios'])){
        $modificar=$_POST['modificar'];
        $_SESSION['modificar2']=$modificar;
        $sql2="SELECT * FROM productos WHERE id='$modificar'";
        $resultado=$conexion->query($sql2);
        while($fila=$resultado->fetch_assoc()){
            $_SESSION['id']=$fila['ID'];
            $_SESSION['nom']=$fila['Nombre'];
            $_SESSION['desc']=$fila['Descripción'];
            $_SESSION['stock']=$fila['Stock'];
            $_SESSION['precio']=$fila['Precio'];
            $_SESSION['descuen']=$fila['Descuento'];
            $_SESSION['imagen']=$fila['Imagen'];
            $_SESSION['categ']=$fila['Categoria'];
        }
    }
    if(isset($_POST['baja'])){
        $borrar = $_POST['modificar'];
        $sql_borrar = "DELETE FROM productos WHERE ID='$borrar'";
        $resultado_borrar = $conexion->query($sql_borrar);
        if ($resultado_borrar) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al intentar eliminar el producto.";
        }
    }
    if(isset($_POST['mod'])){
        $uno=$_POST['id2'];
        $dos=$_POST['nom2'];
        $tres=$_POST['desc2'];
        $cuatro=$_POST['stock2'];
        $cinco=$_POST['precio2'];
        $seis=$_POST['descuen2'];
        $siete=$_POST['imagen2'];
        $ocho=$_POST['categ2'];
        $modificar1=$_SESSION['modificar2'];
        $ne="UPDATE productos SET ID='$uno', Nombre='$dos', Descripción='$tres', Stock='$cuatro', Precio='$cinco', Descuento='$seis', Imagen='$siete', Categoria='$ocho' WHERE id='$modificar1'";
        $fin=$conexion->query($ne);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formproducto.css">
    <title>Modificar - PlacoShoes</title>
</head>
<body>
<div class="contenedor1">
    <div class="contenedor2">
        <div class="izquierdaAlta">
        <?php        
        $sql = 'SELECT * FROM productos';
        $resultado = $conexion -> query($sql);
        if ($resultado -> num_rows){
        ?>        
        <div class="izqAlta">      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>   
            <br>
            <select   class="custom-select" name='modificar' >    
                <?php
                $salida='<table>';
                while( $fila = $resultado -> fetch_assoc() ){
                    echo '<option value="'.$fila["ID"].'">'.$fila["Nombre"].'</option>';
                    $salida.= '<tr>';
                    $salida.= '<td>'. $fila['ID'] . '</td>';
                    $salida.= '<td>'. $fila['Nombre'] . '</td>';
                    $salida.= '<td>'. $fila['Descripción'] . '</td>';
                    $salida.= '<td>'. $fila['Stock'] . '</td>';
                    $salida.= '<td>'. $fila['Precio'] . '</td>';
                    $salida.= '<td>'. $fila['Descuento'] . '</td>';
                    $salida.= '<td>'. $fila['Imagen'] . '</td>';
                    $salida.= '<td>'. $fila['Categoria'] . '</td>';
                    $salida.= '</tr>';
                    }
                    $salida.= '</table>';
                ?>
            </select>
            <br><br>
            <button type="submit" value="submit" name="cambios">Cambios</button>               
            <button type="submit" value="submit" name="baja">Baja</button>
            </form>
        </div> 
        <?php
        }
        else{
            echo "no hay datos";
        }
        ?>
        </div>
            <div class="izquierdaBaja">
                <?php echo $salida ?>
            </div>
        </div>
        <div class="derecha">
            <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
            <ul class="wrapper">
                <li class="form-row">
                <label for="id">ID</label>
                <input type="number" id="id" name="id2"  value="<?php echo $_SESSION["id"]; ?>" readonly>
                </li>
                <li class="form-row">
                <label for="nombre">NOMBRE</label>
                <input type="text" id="nombre" name="nom2" value="<?php echo $_SESSION["nom"]; ?>">
                </li>
                <li class="form-row">
                <label for="descripcion">DESCRIPCION</label>
                <input type="text" id="descripcion" name="desc2" value="<?php echo $_SESSION["desc"]; ?>">
                </li>
                <li class="form-row">
                <label for="stock">STOCK</label>
                <input type="text" id="stock" name="stock2" value="<?php echo $_SESSION['stock']; ?>">
                </li>
                <li class="form-row">
                <label for="precio">PRECIO</label>
                <input type="text" id="precio" name="precio2" value="<?php echo $_SESSION["precio"]; ?>">
                </li>
                <li class="form-row">
                <label for="descuento">DESCUENTO</label>
                <input type="text" id="descuento" name="descuen2" value="<?php echo $_SESSION["descuen"]; ?>">
                </li>
                <li class="form-row">
                <label for="imagen">IMAGEN</label>
                <input type="text" id="imagen" name="imagen2" value="<?php echo $_SESSION["imagen"]; ?>">
                </li>
                <li class="form-row">
                <label for="categoria">CATEGORIA</label>
                <input type="text" id="categoria" name="categ2" value="<?php echo $_SESSION["categ"]; ?>">
                </li>
                <button type="submit" name="mod">Editar Producto</button>
            </ul>
            </form>       
        </div>
    </div>
</body>
<?php include 'footer.php'?>
</html>