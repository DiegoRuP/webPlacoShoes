<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='bdplacoshoes';
    
    // Creamos la conexión
    $conexion=new mysqli($servidor,$cuenta,$password,$bd);
    if ($conexion->connect_errno){
        die('Error en la conexión');
    } else {
        $id = $_POST['idProducto'];
        $nombre = $_POST['nombreProducto'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $costo = $_POST['precioProducto'];
        $descuento = $_POST['descuentoProducto'];
        $categoria = $_POST['categoriaProducto'];
        $select_dir = 'media/';
        
        // Verificar la subida del archivo que sea correcta
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombre_imagen = basename($_FILES['imagen']['name']);
            $select_image = $select_dir . $nombre_imagen;
            
            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $select_image)) {
                $sql = "INSERT INTO productos (ID, Nombre, Descripcion, Stock, Precio, Descuento, Imagen, Categoria) VALUES ('$id','$nombre','$descripcion','$stock','$costo','$descuento','$nombre_imagen','$categoria')";
                
                // Ejecutar la consulta de query
                $conexion->query($sql);

                if ($conexion->affected_rows >= 1) { // Verificar si se insertó un registro
                    echo "
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Registro Exitoso',
                                text: 'Se dio de alta el producto'
                            }).then(function() {
                                window.location.href='formproducto.php';
                            });
                        </script>";
 
                } else {
                    echo "Error al insertar el producto en la base de datos.";
                }
            } else {
                echo "Error al mover el archivo a la carpeta de destino.";
            }
        } else {
            echo "Error al subir el archivo.";
        }
    }
?>
    

</body>
