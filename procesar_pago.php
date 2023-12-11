<?php
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='bdplacoshoes';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $cantidad = $_POST["cantidad"];
        $cantidadArray = explode(",", $cantidad);

        
        $nombres = isset($_POST["nombresArray"]) ? $_POST["nombresArray"] : '';
        $nombresArray = json_decode($nombres);

        $subtotal = $_POST['subtotal'];
        $cobroenvio = $_POST['cobroenvio'];
        $impuesto = $_POST['impuesto'];
        $totalPago = $_POST['totalpago'];
        $fpago = $_POST['forma_pago'];
        $address = $_POST['direccion'];

        require('fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage('P','A5');

        // Calcula las dimensiones de la página A5
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();

        $imageDir = 'media/plantilla.jpg';
        

        // Obtiene las dimensiones de la imagen
        list($imgWidth, $imgHeight) = getimagesize($imageDir); 

        // Calcula el ancho y alto de la imagen para que quepa en la página A5
        $newWidth = $pageWidth - 20; // Ajusta tamaño de la imagen 
        $newHeight = ($imgHeight * $newWidth) / $imgWidth;

        $pdf->Image($imageDir, 10, 10, $newWidth, $newHeight);
    	$pdf->Image('media/logoAzul.png',50,0,50);
        $coordenadaY = 105;
        
        $pdf->SetFillColor(192);
        $pdf->SetDrawColor(0);
        $pdf->SetTextColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->Ln(35); // Salto de línea
        // Encabezado del ticket
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFillColor(211, 211, 211);
        $pdf->Cell(0, 10, 'TICKET DE COMPRA', 0, 1, 'C', true);
        
        $pdf->Ln(10); // Salto de línea
        
        // Detalles de Compra
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 8, 'Detalles de Compra:', 0, 1, 'C', true);
        
        // Productos
        $pdf->SetFont('Arial', '', 12);
        $i = 1;
        $pdf->Cell(0, 8, 'Productos:', 0, 1, 'C', true);
        foreach ($nombresArray as $nombre) {
            $sql = "SELECT Precio, Descuento FROM productos WHERE Nombre='$nombre'";
            $resultado = $conexion->query($sql);

            if ($resultado && $row = $resultado->fetch_assoc()) {
                $precio = $row['Precio'];
                $descuento = $row['Descuento'];
                if ($descuento > 0) {
                    // SI hay, se aplica descuento
                    $precioConDescuento = $precio - ($precio * ($descuento / 100));
                    $pdf->Cell(0, 8, '$' . number_format($precioConDescuento, 2) . ' - ' . $nombre, 0, 1, 'C');
                } else {
                    // Si no, solo se pone el original
                    $pdf->Cell(0, 8, '$' . number_format($precio, 2) . ' - ' . $nombre, 0, 1, 'C');
                }
            }
        }
        $pdf->SetY($coordenadaY+10);
        $pdf->Cell(0, 8, 'Subtotal: $' . number_format($subtotal, 2), 0, 1, 'C');
        $pdf->SetY($coordenadaY+20);
        $pdf->Cell(0, 8, 'Cobro de envio: $' . number_format($cobroenvio, 2), 0, 1, 'C');
        $pdf->SetY($coordenadaY+30);
        $pdf->Cell(0, 8, 'Impuesto Adherido: $' . number_format($impuesto, 2), 0, 1, 'C');
        $pdf->SetY($coordenadaY+40);
        $pdf->Cell(0, 8, 'TOTAL A PAGAR: $' . number_format($totalPago, 2), 0, 1, 'C');
        $pdf->SetY($coordenadaY+45);
        $pdf->Cell(0, 8, 'Metodo de Pago: ' . $fpago, 0, 1, 'C');
        $pdf->SetY($coordenadaY+50);
        $pdf->Cell(0, 8, 'Direccion de envio: ' . $address, 0, 1, 'C');
        
        $pageHeight = $pdf->GetPageHeight();
        $contentHeight = $pdf->GetY();
        $remainingSpace = ($pageHeight - $contentHeight) / 2;
        $pdf->SetY($remainingSpace);

        $pdf->Output();
        
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
<!-- no funciona la alerta por culpa del pdf, no supe como solucionarlo :( -->
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