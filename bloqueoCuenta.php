<?php
session_start();

if (isset($_SESSION['userblock'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bdplacoshoes";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $user = $_SESSION['userblock'];
    $campo = "Online";

    // Usar UPDATE para actualizar el campo "Online" a 1
    $sql = "UPDATE usuarios SET $campo = 1 WHERE Cuenta = '$user'";
    $resultado = $conn->query($sql);

    if ($resultado) {
        header("Location: login.php");
        exit(); // Importante: terminar la ejecución del script después de redirigir
    } else {
        echo "Error en la actualización: " . $conn->error;
    }
}else {
    echo "no hay usuario";
}
?>
