<?php session_start(); ?>
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

    $servername='localhost';
    $username='placoTest';
    $password='testPlacoPass';
    $database='bdplacoshoes';

$intentos = isset($_SESSION['intentos']) ? $_SESSION['intentos'] : 0;
$inres = isset($_SESSION['inres']) ? $_SESSION['inres'] : 3;

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
    $online = "Online";

    // Buscar en la base de datos
    $sql = "SELECT nombre, contraseña, cuenta, $online FROM usuarios WHERE cuenta = '$usuario'";

    $result = $conn->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row['cuenta'];
            $contraseña_encriptada = $row['contraseña'];
            $bloqueo = $row[$online];
    
            if ($bloqueo == 0) {
    
                // Desencriptar la contraseña almacenada en la base de datos
                $contraseña_guardada = decrypt($contraseña_encriptada);
    
                // Verificar la contraseña
                if ($contraseña == $contraseña_guardada && $usuario == $nombre) {
    
                    // Si el checkbox "Recuérdame" está marcado, establecer la cookie
                    if ($recordar) {
                        setcookie("usuario", $usuario, time() + 3600, "/"); // La cookie expirará en 1 hora
                        setcookie("contraseña", $contraseña, time() + 3600, "/"); // La cookie expirará en 1 hora
                    }
    
                    header("Location: captcha.php");
                    $_SESSION["usernav"] = $usuario;
    
                } else if ($contraseña != $contraseña_guardada) {
                    $_SESSION["userblock"] = $usuario;
    
                    $intentos++;
    
                    // Almacenar el contador de intentos en la sesión
                    $_SESSION['intentos'] = $intentos;
    
                    if ($intentos === 3) {
    
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Intentos Excedido',
                                text: 'Cuenta Bloqueada'
                            }).then(function() {
                                window.location.href='bloqueoCuenta.php';
                            });
                         </script>";
    
                        $_SESSION['intentos'] = 0;
                        $_SESSION['inres'] = 3;
    
                    } else {
    
                        $inres--;
                        $_SESSION['inres'] = $inres;
    
                        echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Contraseña Incorrecta Intentos restantes $inres'
                        }).then(function() {
                            window.location.href='login.php';
                        });
                        </script>";
    
                    }
    
                }
            } else {
                // El usuario está bloqueado, puedes mostrar una alerta o realizar alguna acción específica
            }
        } else {
            // El usuario no existe en la base de datos, mostrar alerta
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El usuario no existe'
                }).then(function() {
                    window.location.href='login.php';
                });
                </script>";
        }
    } else {
        // Manejar el caso de error en la consulta SQL
        echo "Error en la consulta SQL: " . $conn->error;
    }


    }else{
        echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Cuenta Bloqueada',
                        text: 'Excedio sus Intentos'
                    }).then(function() {
                        window.location.href='login.php';
                    });
                 </script>";
    }
// Cerrar conexión
$conn->close();
?>
    
</body>


