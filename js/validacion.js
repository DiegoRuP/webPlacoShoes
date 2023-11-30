function validarContraseñas() {
  var contraseña1 = document.getElementById('Contraseña').value;
  var contraseña2 = document.getElementById('Contraseña2').value;

  if (contraseña1 !== contraseña2) {
      // Utilizando SweetAlert para mostrar la alerta
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Las contraseñas no coinciden',
      });

      return false; // Detener el envío del formulario
  }

  return true; // Permitir el envío del formulario
}

  
var intentosIncorrectos = 0;

function validarIntentos() {
    var contrasena = document.getElementById("Contraseña").value;
    var contrasenaRepetida = document.getElementById("Contraseña2").value;

    if (contrasena === contrasenaRepetida) {
        //si coinciden
        Swal.fire({
            icon: 'success',
            title: 'Bienvenido',
            text: 'Contraseña correcta',
        });
    } else {
        //si no coinciden
        intentosIncorrectos++;

        if (intentosIncorrectos === 3) {
            Swal.fire({
                icon: 'error',
                title: 'Número de intentos excedido',
                text: 'Cuenta bloqueada',
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Contraseñas no coinciden',
            });
        }
    }
}