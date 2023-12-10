<?php include 'navbar.php'?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cantidad = $_POST["quantity"];
        $total = $_POST["total"];


        $nombres = isset($_POST["nombre"]) ? $_POST["nombre"] : '';


        $nombresArray = json_decode($nombres);
        
        if ($nombresArray !== null) {
            //echo "Nombres: " . implode(", ", $nombresArray);
        } else {
            echo "No se proporcionaron nombres.";
        }
    } else {
        
        echo "No se han enviado datos por POST.";
    }

?>

<head>
  <title>Admin - PlacoShoes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="css/finalizar_compra.css" rel="stylesheet">
</head>

<body>

<div class="d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center" style="margin:20px;">
      <div class="col-lg-6 col-md-8 caja-login">
        <div class="col-lg-12 caja-titulo">
          Detalles del pago
        </div>
        <div class="col-lg-12 login-form">
            <form method="post" action="procesar_pago.php">
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="forma_pago" id="tarjeta_credito" value="tarjeta_credito" required>
                    <label class="form-check-label" for="tarjeta_credito">
                        Pago con Tarjeta de Crédito
                    </label>
                </div>

                
                <div id="campos_tarjeta" style="display: none">
                    <div class="form-group">
                        <input class="form-check-input" type="radio" name="banorte" id="tarjeta_banorte" value="tarjeta_banorte" required>
                        <img src="media/logobanorte.jpg" alt="" width="150px;">
                        <input class="form-check-input" type="radio" name="banorte" id="tarjeta_bbva" value="tarjeta_bbva" required>
                        <img src="media/logobbva.png" alt="" width="150px; " style="margin-left: 50px;">
                    </div>
                    <div class="form-group">
                        <label for="numero_tarjeta">Número de Tarjeta:</label>
                        <input type="text" class="form-control" name="numero_tarjeta" id="numero_tarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre_titular">Nombre del Titular:</label>
                        <input type="text" class="form-control" name="nombre_titular" id="nombre_titular" placeholder="Nombre de titular" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha_expiracion">Fecha de Expiración:</label>
                        <input type="text" class="form-control" name="fecha_expiracion" id="fecha_expiracion" placeholder="MM/AA" required>
                    </div>

                    <div class="form-group">
                        <label for="codigo_seguridad">Código de Seguridad:</label>
                        <input type="number" class="form-control" name="codigo_seguridad" id="codigo_seguridad" placeholder="000" min="0" max="999" required>
                    </div>
                </div>

                <!-- Opción de pago en OXXO -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="forma_pago" id="pago_oxxo" value="pago_oxxo" required>
                        <label class="form-check-label" for="pago_oxxo">
                            Pago en OXXO
                        </label>
                    <div id="campos_oxxo" style="display: none;">
                        <br>
                        <img src="media/logo_oxxo.png" alt="" width="200px;">
                        <br>
                        <br>
                        <div id="fotobarras"><img src="media/codigobarras.png" alt="" width="150px;"></div>
                        <h4>Instrucciones</h4>
                        <h5>1. Acudir a tu Oxxo mas cercano.</h5>
                        <h5>2. Indica en caja que quieres realizar un pago Oxxo</h5>
                        <h5>3. Muestra al cajero el codigo de barras</h5>
                    </div>
                </div>

                
                <br>

                <!-- Código de cupón -->
                <label for="cupon">Código de Cupón:</label>
                <input type="text" name="cupon" id="cupon">

                <br>

                <!-- País y impuestos -->
                <label for="pais">Selecciona tu país:</label>
                <select name="pais" id="pais" onchange="actualizarConfiguracion()" required>
                    <option value="" disabled selected>Selecciona tu país</option>
                    <option value="mexico">México</option>
                    <option value="canada">Canada</option>
                </select>
                <br>
                <br>
                <h3>Envios Nacionales Gratuitos!</h3>
                <br>
                <br>
                <br>
                <div id="contenedorDesglosePago"></div>
                <br>
                
                <input type="hidden" name="cantidad" value="<?php echo $cantidad; ?>">
                <input type="hidden" name="nombresArray" value="<?php echo htmlspecialchars(json_encode($nombresArray), ENT_QUOTES, 'UTF-8'); ?>">
                <input class="btn2 btn2-outline-primary"  type="submit" value="Pagar">
            </form>
        </div>
    </div>
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    
    $('input[name="forma_pago"]').change(function () {
        var camposTarjeta = document.getElementById('campos_tarjeta');
        var camposOXXO = document.getElementById('campos_oxxo');
        if ($('#tarjeta_credito').is(':checked')) {
            
            document.getElementById('campos_tarjeta').style.display = 'block';
            document.getElementById('campos_oxxo').style.display = 'none';
            camposTarjeta.querySelectorAll('[data-original-required]').forEach(function (element) {
                element.setAttribute('required', 'required');
            });
        } else {
            
            document.getElementById('campos_tarjeta').style.display = 'none';
            document.getElementById('campos_oxxo').style.display = 'block';
            camposTarjeta.querySelectorAll('[required]').forEach(function (element) {
                element.removeAttribute('required');
            });
        }
    });

function actualizarConfiguracion() {
    var paisSeleccionado = document.getElementById('pais').value;
    var impuestos2 = 0;
    var totalPagar = 0;
    var envio =0 ;

    // Configuración para México
    if (paisSeleccionado === 'mexico') {
        var total = <?php echo $total;?>; 
        impuestos2 = total * 0.16;
        totalPagar = total * 1.16;

    // Configuración para Canadá
    } else if (paisSeleccionado === 'canada') {
        var total = <?php echo $total;?>; 
        envio = 500;
        impuestos2 = total * 0.05;
        totalPagar = total * 1.05;
        totalPagar = totalPagar + envio;
    }

    // Actualizar visualización del desglose de pago
    var containerProduct = document.getElementById('contenedorDesglosePago');
    containerProduct.innerHTML = `
        <div class="desglosepago"> 
            <h3>Desglose del Pago</h3>
            <h4>Valor en productos: $${total.toFixed(2)} MXN</h4>
            <h4>Impuesto: $${impuestos2.toFixed(2)} MXN</h4>
            <h4>Envio: $${envio.toFixed(2)} MXN</h4>
            <h4>Total a pagar: $${totalPagar.toFixed(2)} MXN</h4>
        </div>
    `;

    console.log('Impuestos: ' + impuestos2 + '%');
    console.log('Total a pagar: ' + totalPagar);
}

document.getElementById('numero_tarjeta').addEventListener('input', function (e) {
    // Obtener el valor actual del campo
    let input = e.target;
    let value = input.value;

    // Eliminar caracteres no numéricos
    let numericValue = value.replace(/\D/g, '');

    // Aplicar el formato de tarjeta (XXXX-XXXX-XXXX-XXXX)
    let formattedValue = numericValue.replace(/(\d{4})/g, '$1-');

    // Eliminar el guión adicional al final (si lo hay)
    formattedValue = formattedValue.replace(/-$/, '');

    // Actualizar el valor del campo
    input.value = formattedValue;
});

// Puedes agregar la validación adicional para aceptar solo números y verificar la longitud si es necesario
document.getElementById('numero_tarjeta').addEventListener('keypress', function (e) {
    // Solo permitir números (código ASCII)
    if (e.which < 48 || e.which > 57) {
        e.preventDefault();
    }
});


</script>

</body>
<?php include 'footer.php'?>