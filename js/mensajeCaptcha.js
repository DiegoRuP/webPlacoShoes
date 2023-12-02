function mostrarAlerta() {
    var captchaUsuario = document.getElementById("captchaUsuario").value;
    var captchaGenerado = document.getElementById('captchaGenerado').value;
        if(captchaUsuario !== captchaGenerado){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'ERROR - LOS DATOS NO COINCIDEN',
                confirmButtonText: 'OK',
                timer: 5000, //milisegundos - el tiempo que este la alerta para que el usuario la alcance a leer
            });
            return false; //se detiene el envio del formulario
        }
        return true;//se envia el formulario
}