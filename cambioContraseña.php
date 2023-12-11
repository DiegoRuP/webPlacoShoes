<?php include 'navbar.php';

    $servername='localhost';
    $username='placoTest';
    $password='testPlacoPass';
    $database='bdplacoshoes';

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Definir la clave de cifrado
define('SECRET_KEY', 'TuClaveSecreta');
define('SECRET_IV', '1234567890123456');

function encrypt($input) {
    $output = openssl_encrypt($input, 'AES-256-CBC', SECRET_KEY, 0, SECRET_IV);
    $output = base64_encode($output);
    return $output;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['user'];
    $nuevaContra = $_POST['contraseña'];
    $contra_encriptada = encrypt($nuevaContra);
    
    // Usar SELECT para obtener el animal asociado al usuario
    $sql = "UPDATE usuarios SET Contraseña = '$contra_encriptada' WHERE Cuenta = '$user'";
    $resultado = $conn->query($sql);

    if ($resultado) {
        $successMessage = "Cambio Exitoso";
    } else {
        $errorMessage = "Error en la actualización: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Cambio Contraseña</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<br><br><br><br>
<body>

    <div class="loginBody">
        <div class="form">
            <h2>Cambio Contraseña</h2>
            <form id="ActForm" class="login-form" method="post" onsubmit="return validarContraseñas();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="password" placeholder="Contraseña*" id="contraseña" name="contraseña" required>
            <input type="password" placeholder="Repetir Contraseña*" id="contraseña2" name="contraseña2" required>

            <button class="btn" type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Actualizar
            </button>
            </form> 
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/login.js"></script>
<script src="js/validacion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    // Mostrar alertas después de que se haya procesado el formulario
    if (isset($successMessage)) {
        echo "
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '$successMessage'
        }).then(function() {
            window.location.href='login.php';
        });
        </script>";
    }

    if (isset($errorMessage)) {
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '$errorMessage'
        }).then(function() {
            window.location.href='login.php';
        });
        </script>";
    }
    ?>
<br><br><br><br><br><br><br>
<?php include 'footer.php'?>
</body>
</html>
