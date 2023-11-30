

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body class="loginBody">
<?php include 'navbar.php'?>
  <div class="form">
 <!-- Aqui preguntamos si quiere crear cuenta -->
    <form class="register-form" method="POST">
      <h2>Registrarse</h2>
      <input type="text" placeholder="Nombre" id="nombre" required/>
      <input type="text" placeholder="Cuenta" id="cuenta" required/>
      <input type="email" placeholder="Correo" id="correo" required/>
      <input type="text" placeholder="Animal favorito" id="seguridad" required/>
      <input type="password" placeholder="Contraseña*" id="Contraseña" required/>
      <input type="password" placeholder="Repetir Contraseña*" id="Contraseña2" required/>

      <a class="btn" href="javascript:void(0);" onclick="validarContraseñas()">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Crear Cuenta
      </a>

      <p class="message">¿Ya estas registrado? <a href="#">Logeate</a></p>
    </form>
    <!-- Aqui preguntamos si ya tiene cuenta -->
    <form class="login-form" method="post">
      <h2></i> Iniciar Sesion</h2>
      <input type="text" placeholder="Nombre" id="inombre" required />
      <input type="password" placeholder="Contraseña" id="icontra" required/>

      <a class="btn" href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Logearse
      </a>
      <br>
      <h5>Recuerdame</h5>
      <div class="checkbox-container">
        <input type="checkbox" id="recordar">
      </div>
      <p class="message">¿No tienes cuenta?<a href="#"> Crea una</a></p>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/login.js"></script>
<script src="js/validacion.js"></script>

</body>
</html>