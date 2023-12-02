<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdplacoshoes";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contraseña = '$contraseña'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["usuario"] = $nombre;
        if(!empty($_POST["recordar"])){
            setcookie("nombre",$_POST["nombre"],time()+3600);
            setcookie("contraseña",$_POST["contraseña"],time()+3600);
        }else{
            setcookie("nombre","");
            setcookie("contraseña","");
        }
        header("Location: principal.php");
        exit();
    } else {
        echo "Credenciales incorrectas";
    }
    $conn->close();
}
?>