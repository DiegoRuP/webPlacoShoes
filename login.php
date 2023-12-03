<?php include 'navbar.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Iniciar sesión</title>
<link rel="stylesheet" href="css/style.css">
</head>
<br><br><br><br>
<body>
  <div class="loginBody">
  <div class="form">
 <!-- Aqui preguntamos si quiere crear cuenta -->
    <form id="RegForm" class="register-form" method="POST" action="registro.php">
      <h2>Registrarse</h2>
      <input type="text" placeholder="Nombre" id="nombre" name="nombre" required/>
    <input type="text" placeholder="Cuenta" id="cuenta" name="cuenta" required/>
    <input type="email" placeholder="Correo" id="correo" name="correo" required/>
    <input type="text" placeholder="Animal favorito" id="seguridad" name="animal" required/>
    <input type="password" placeholder="Contraseña*" id="contraseña" name="contraseña" required/>
    <input type="password" placeholder="Repetir Contraseña*" id="contraseña2" name="contraseña2" required/>

    <a class="btn" href="javascript:void(0);" onclick="if(validarContraseñas()){document.getElementById('RegForm').submit()} ">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Crear Cuenta
    </a>


      <p class="message">¿Ya estas registrado? <a href="#">Inicia sesión</a></p>
    </form>
    <!-- Aqui preguntamos si ya tiene cuenta -->
    <form id="loginForm" class="login-form" method="post" action="validarLogin.php">
            <h2>Iniciar Sesion</h2>
            <input type="text" placeholder="Nombre" name="inombre" value="<?php if(isset($_COOKIE["inombre"])){ echo $_COOKIE["inombre"];}?>" required />
            <input type="password" placeholder="Contraseña" name="icontra" value="<?php if(isset($_COOKIE["icontra"])){ echo $_COOKIE["icontra"];}?>" required/>

            <a class="btn" onclick="document.getElementById('loginForm').submit()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Iniciar sesión
            </a>
            
            <br>
            <h5>Recuérdame</h5>
            <div class="checkbox-container">
                <input type="checkbox" name="recordar" id="recordar">
            </div>
            
            <p class="message">¿No tienes cuenta?<a href="#"> Registrarte </a></p>
            <p class="message">¿Olvidaste tu contraseña?<a href="desbloquearCuenta.php" > Recuperar </a></p>
        </form>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/login.js"></script>
  <script src="js/validacion.js"></script>
  <br><br><br>
<?php include 'footer.php'?>
</body>
</html>

