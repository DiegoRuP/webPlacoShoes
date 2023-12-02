function validarContraseñas() {
  var contraseña1 = document.getElementById('contraseña').value;
  var contraseña2 = document.getElementById('contraseña2').value;

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

// PUEDE SER UTILIZADO PARA BACK, A LA HORA DE INICIAR SESION
function validarIntentos() {
    var contrasena = document.getElementById("contraseña").value;
    var contrasenaRepetida = document.getElementById("contraseña2").value;

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
