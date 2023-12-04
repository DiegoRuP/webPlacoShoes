function mostrarNombreArchivo() {
  var input = document.getElementById('imagen');
  var nombreArchivo = input.files[0].name;
  var label = document.getElementById('label-imagen');
  label.textContent = 'Archivo seleccionado: ' + nombreArchivo;
  }