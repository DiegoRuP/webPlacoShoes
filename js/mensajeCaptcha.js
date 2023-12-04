function mostrarAlerta() {
    var captchaUsuario = document.getElementById("captchaUsuario").value;
    var captchaGenerado = document.getElementById('captchaGenerado').value;
        if(captchaUsuario !== captchaGenerado){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'ERROR - LOS DATOS NO COINCIDEN',
                confirmButtonText: 'OK',
                timer: 3000, //milisegundos - el tiempo que este la alerta para que el usuario la alcance a leer
                onClose: () => {
                    return false; // se detiene el envío del formulario
                    
                }
            });
            return false; //se detiene el envio del formulario
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Muy Bien',
                text: 'LOS DATOS COINCIDEN',
                confirmButtonText: 'OK',
                timer: 1000, //milisegundos - el tiempo que este la alerta para que el usuario la alcance a leer
                showConfirmButton: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("captchaForm").submit();
                }
            });

        }
    return false;
}