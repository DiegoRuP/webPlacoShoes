<?php
include 'navbar.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "bdplacoshoes";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['usuario'];
    $respuesta = $_POST['respuesta'];

    $_SESSION['user'] = $user;

    // Usar SELECT para obtener el animal asociado al usuario
    $sql = "SELECT animal FROM usuarios WHERE cuenta = '$user'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $animalbd = $row["animal"];
        $campo = "Online";

        if ($animalbd == $respuesta) {
            // Usar UPDATE para actualizar el campo "Online" a 0
            $sql = "UPDATE usuarios SET $campo = 0 WHERE Cuenta = '$user'";
            $resultado = $conn->query($sql);

            if ($resultado) {
                $successMessage = "Desbloqueo Exitoso";
            } else {
                $errorMessage = "Error en la actualización: " . $conn->error;
            }
        } else {
            $errorMessage = "Respuesta Incorrecta";
        }
    } else {
        $errorMessage = "Error en la consulta: " . $conn->error;
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
    <title>Desbloqueo Cuenta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<br><br><br><br>
<body>

    <div class="loginBody">
        <div class="form">
            <h2>Desbloqueo de Cuenta</h2>
            <form id="captchaForm" class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" id="usuario" name="usuario" placeholder="Nombre de Usuario" required>
                <p class="message2">¿Cuál es tu animal favorito?</p>
                <input type="text" id="respuesta" name="respuesta" placeholder="Respuesta" required>
                <input class="btn" type="submit" value="Desbloquear"></button>
            </form> 
        </div>
    </div>

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
            window.location.href='cambioContraseña.php';
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
            window.location.href='desbloquearCuenta.php';
        });
        </script>";
    }
    ?>
    
    <br><br><br>
    
    <?php include 'footer.php'?>
</body>
</html>
