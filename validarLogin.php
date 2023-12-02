<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "bdplacoshoes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Definir la clave de cifrado
define('SECRET_KEY', 'TuClaveSecreta');
define('SECRET_IV', '1234567890123456');

function decrypt($input) {
    $output = base64_decode($input);
    $output = openssl_decrypt($output, 'AES-256-CBC', SECRET_KEY, 0, SECRET_IV);
    return $output;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario

    if(!empty($_POST["recordar"])){
        setcookie ("inombre", $_POST["inombre"],time()+3600);
        setcookie ("icontra", $_POST["icontra"],time()+3600);
    }else{
        setcookie("inombre","");
        setcookie("icontra","");
    }
    

    $usuario = $_POST['inombre'];
    $contraseña = $_POST['icontra'];
    $recordar = isset($_POST['recordar']) ? $_POST['recordar'] : false;

    // Buscar en la base de datos
    $sql = "SELECT nombre, contraseña FROM usuarios WHERE cuenta = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $contraseña_encriptada = $row['contraseña'];

        // Desencriptar la contraseña almacenada en la base de datos
        $contraseña_guardada = decrypt($contraseña_encriptada);

        // Verificar la contraseña
        if ($contraseña == $contraseña_guardada) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION["usuario"] = $usuario;

            // Si el checkbox "Recuérdame" está marcado, establecer la cookie
            if ($recordar) {
                setcookie("usuario", $usuario, time() + 3600, "/"); // La cookie expirará en 1 hora
                setcookie("contraseña", $contraseña, time() + 3600, "/"); // La cookie expirará en 1 hora
            }

            header("Location: captcha.php");
        } else if ($contraseña != $contraseña_guardada) {
            // Mostrar mensaje de error con SweetAlert 2
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Contraseña Incorrecta'
                    }).then(function() {
                        window.location.href='login.php';
                    });
                 </script>";
        }
    }
}
// Cerrar conexión
$conn->close();
?>
    
</body>

