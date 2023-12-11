<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = 'placoTest';
$password = 'testPlacoPass';
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

function encrypt($input) {
    $output = openssl_encrypt($input, 'AES-256-CBC', SECRET_KEY, 0, SECRET_IV);
    $output = base64_encode($output);
    return $output;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $cuenta = $_POST['cuenta'];
    $correo = $_POST['correo'];
    $animal = $_POST['animal'];
    $contraseña = $_POST['contraseña']; // Guardar la contraseña de forma segura

    $contra_encriptada = encrypt($contraseña);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, cuenta, correo, animal, contraseña, online, admin) VALUES ('$nombre', '$cuenta', '$correo', '$animal', '$contra_encriptada', 0, 0)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Registro Exitoso'
                }).then(function() {
                    window.location.href='login.php';
                });
             </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
</body>