function validarContraseñas() {
    var contraseña1 = document.getElementById('Contraseña').value;
    var contraseña2 = document.getElementById('Contraseña2').value;
  
    if (contraseña1 !== contraseña2) {
      alert('Las contraseñas no coinciden');
      return false; // Detener el envío del formulario
    }
  
    return true; // Permitir el envío del formulario
  }