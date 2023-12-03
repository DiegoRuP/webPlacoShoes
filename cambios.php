<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
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
            $_SESSION['desc']=$fila['Descripcion'];
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
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'PRODUCTO ELIMINADO CORRECTAMENTE',
                confirmButtonText: 'OK',
                timer: 1000, //milisegundos - el tiempo que este la alerta para que el usuario la alcance a leer
                showConfirmButton: false
            });</script>";
        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NO SE PUEDO ELIMINAR EL PRODUCTO SELECCIONADO',
                confirmButtonText: 'OK',
                timer: 3000, //milisegundos - el tiempo que este la alerta para que el usuario la alcance a leer
            });</script>";
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
        $ne="UPDATE productos SET ID='$uno', Nombre='$dos', Descripcion='$tres', Stock='$cuatro', Precio='$cinco', Descuento='$seis', Imagen='$siete', Categoria='$ocho' WHERE id='$modificar1'";
        $fin=$conexion->query($ne);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <select   class="prod custom-select" name='modificar' >    
                <?php
                echo '<div style="margin:80px;">';
                $salida='<table class="tab table table-success table-striped table-hover table-bordered border-dark">';
                while( $fila = $resultado -> fetch_assoc() ){
                    echo '<option value="'.$fila["ID"].'">'.$fila["Nombre"].'</option>';
                    $salida.= '<tr>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['ID'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Nombre'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Descripcion'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Stock'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Precio'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Descuento'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Imagen'] . '</td>';
                    $salida.= '<td class="table-group-divider border-dark">'. $fila['Categoria'] . '</td>';
                    $salida.= '</tr>';
                    }
                    $salida.= '</table>';
                ?>
            </select>
            <br><br>
            <button class="prod" type="submit" value="submit" name="cambios">Cambios</button>               
            <button class="prod" type="submit" value="submit" name="baja">Baja</button>
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
                <label class="labcol form-control-label" for="id">ID</label>
                <input class="form-control" type="number" id="id" name="id2"  value="<?php echo $_SESSION["id"]; ?>" readonly>
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="nombre">NOMBRE</label>
                <input class="form-control" type="text" id="nombre" name="nom2" value="<?php echo $_SESSION["nom"]; ?>">
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="descripcion">DESCRIPCION</label>
                <input class="form-control" type="text" id="descripcion" name="desc2" value="<?php echo $_SESSION["desc"]; ?>">
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="stock">STOCK</label>
                <input class="form-control" type="text" id="stock" name="stock2" value="<?php echo $_SESSION['stock']; ?>">
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="precio">PRECIO</label>
                <input class="form-control" type="text" id="precio" name="precio2" value="<?php echo $_SESSION["precio"]; ?>">
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="descuento">DESCUENTO</label>
                <input class="form-control" type="text" id="descuento" name="descuen2" value="<?php echo $_SESSION["descuen"]; ?>">
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="imagen">IMAGEN</label>
                <input class="form-control" type="text" id="imagen" name="imagen2" value="<?php echo $_SESSION["imagen"]; ?>">
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="categoria">CATEGORIA</label>
                <input class="form-control" type="text" id="categoria" name="categ2" value="<?php echo $_SESSION["categ"]; ?>">
                </li>
                <button class="btn2 btn2-outline-primary" type="submit" name="mod">Editar Producto</button>
                <button class="btn2 btn2-outline-primary" type="button" name="mod" onclick="window.location.href='formproducto.php';">Regresar</button>
            </ul>
            </form>       
        </div>
    </div>
</body>
<?php include 'footer.php'?>
</html>