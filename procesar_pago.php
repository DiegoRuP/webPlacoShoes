<?php include 'navbar.php'?>
<?php
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='bdplacoshoes';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $cantidad = $_POST["cantidad"];
        $cantidadArray = explode(",", $cantidad);

        
        $nombres = isset($_POST["nombresArray"]) ? $_POST["nombresArray"] : '';
        $nombresArray = json_decode($nombres);
    
    
        
        if ($nombresArray !== null) {
            //echo "Nombres: " . implode(", ", $nombresArray);
        } else {
            echo "No se proporcionaron nombres.";
        }
    } else {
        echo "No se han enviado datos por POST.";
    }
    
    foreach ($nombresArray as $index => $nombre) {
        
        $cantidadProducto = (int)$cantidadArray[$index];
    
        // Consulta de actualización
        $sql = "UPDATE productos SET Stock = Stock - $cantidadProducto WHERE Nombre = '$nombre'";
    
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            //echo "Stock actualizado para $nombre.<br>";
        } else {
            echo "Error al actualizar el stock: " . $conn->error;
        }
    }
    $conn->close();
    ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
            title: "Compra realizada!",
            text: "Tus productos se enviarán en unos momentos!",
            icon: "success"
            }).then(function () {
                window.location.href = 'principal.php';
        });
    </script>
    <?php
?>
<?php include 'footer.php'?>