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
    if(isset($_POST['confirmar'])){
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
        $borrar = $_POST['id_baja'];
        $sql_borrar = "DELETE FROM productos WHERE ID='$borrar'";
        $resultado_borrar = $conexion->query($sql_borrar);
        if ($resultado_borrar) {
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'PRODUCTO ELIMINADO CORRECTAMENTE',
                confirmButtonText: 'OK',
                timer: 5000, //milisegundos - el tiempo que este la alerta para que el usuario la alcance a leer
                showConfirmButton: false,
                onClose: () => {
                    return false; // se detiene el envío del formulario
                }
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
        $target_dir = "media/";
        $target_file = $target_dir . basename($_FILES["imagen2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verificar si el archivo es una imagen real o un archivo falso
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen2"]["tmp_name"]);
            if ($check !== false) {
                echo "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "El archivo no es una imagen.";
                $uploadOk = 0;
            }
        }

        // Verificar si el archivo ya existe
        if (file_exists($target_file)) {
            
            $nombreimag= htmlspecialchars(basename($_FILES["imagen2"]["name"]));
            $siete= $nombreimag;
            $uploadOk = 0;
        }

        // Verificar el tamaño del archivo
        if ($_FILES["imagen2"]["size"] > 500000) {
            echo "Lo siento, tu archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Permitir ciertos formatos de archivo
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }

        // Verificar si $uploadOk está configurado en 0 por un error
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.";
        } else {
            // Si todo está bien, intentar subir el archivo
            if (move_uploaded_file($_FILES["imagen2"]["tmp_name"], $target_file)) {
                echo "El archivo " . htmlspecialchars(basename($_FILES["imagen2"]["name"])) . " ha sido subido.";
                $nombreimag= htmlspecialchars(basename($_FILES["imagen2"]["name"]));
                $siete= $nombreimag;
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
            }
        }
    
        $uno=$_POST['id2'];
        $dos=$_POST['nom2'];
        $tres=$_POST['desc2'];
        $cuatro=$_POST['stock2'];
        $cinco=$_POST['precio2'];
        $seis=$_POST['descuen2'];
        //$siete=$_POST['imagen2'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
                echo '<div>';
                $salida='<table>';
                while( $fila = $resultado -> fetch_assoc() ){
                    echo '<option value="'.$fila["ID"].'">'.$fila["Nombre"].'</option>';
                    $salida.= '<tr>';
                    $salida.= '<td>'. $fila['ID'] . '</td>';
                    $salida.= '<td>'. $fila['Nombre'] . '</td>';
                    $salida.= '<td>'. $fila['Descripcion'] . '</td>';
                    $salida.= '<td>'. $fila['Stock'] . '</td>';
                    $salida.= '<td>'. $fila['Precio'] . '</td>';
                    $salida.= '<td>%'. $fila['Descuento'] . '</td>';
                    $salida.= '<td>'. $fila['Imagen'] . '</td>';
                    $salida.= '<td>'. $fila['Categoria'] . '</td>';
                    $salida.= '</tr>';
                    }
                    $salida.= '</table>';
                ?>
            </select>
            <button class="btn2 btn2-outline-primary confirmar" type="submit" value="submit" name="confirmar" onclick="myFunction()">Confirmar</button>               
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
            <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
            <ul class="wrapper">
                <li>
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
                
                <!-- <label class="labcol form-control-label" for="imagenu">IMAGEN</label> -->
                <div class="form-group">
                    <label for="imagen" class="btn2 btn2-outline-primary">Subir tu foto</label> 
                    <input type="file" name="imagen2" id="imagen" class="form-control-file"  >
                </div> 
                <!-- <label for="imagen2" class="btn2 btn2-outline-primary">Subir tu foto</label>
                <input type="file" name="imagen2" id="imagen"> -->
                
                <!-- <input class="form-control" type="text" id="imagen" name="imagen2" value="<?php echo $_SESSION["imagen"]; ?>?"> -->
                <?php
                $img= "media/" . $_SESSION["imagen"];
                ?>
                <div id="producImage imagenOculta">
                    <img id="productImage" src="<?php echo $img ?>">
                </div>
                </li>
                <li class="form-row">
                <label class="labcol form-control-label" for="categoria">CATEGORIA</label>
                <input class="form-control" type="text" id="categoria" name="categ2" value="<?php echo $_SESSION["categ"]; ?>">
                </li>

                <button class="btn2 btn2-outline-primary" type="submit" name="mod">Confirmar edicion</button>
                <input type="hidden" name="id_baja" value="<?php echo $_SESSION['id']; ?>">
                <button class="btn2 btn2-outline-primary" type="submit" value="submit" name="baja">Baja</button>
                <button class="btn2 btn2-outline-primary" type="button" name="mod" onclick="window.location.href='formproducto.php';">Regresar</button>
                
            </ul>
            </form>       
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        const btnConfirmar = document.querySelector(".confirmar");
    const mostrarImagen = document.querySelector("#productImage");
    btnCarrito.addEventListener('click', () => {
        mostrarImagen.classList.toggle('productImage');
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include 'footer.php'?>
</body>
</html>