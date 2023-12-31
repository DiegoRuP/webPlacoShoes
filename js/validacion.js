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
  
        // Detener el envío del formulario
        return false;
    }
  
    // Permitir el envío del formulario
    return true;
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

//validacion de inicio de sesion para el carrito
function validarCarrito(){
    Swal.fire({
        title: 'Inicio de sesión requerido',
        text: 'Para acceder al carrito, se requiere que inice sesión',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iniciar sesión o crear cuenta'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'login.php'; //si el usuario dio clic en aceptar, mandar al login
        }
    });
}


//funcion de filtrar por precio
function filtrarPrecio() {
    var filtroGenero = document.getElementById('filtroGenero').value;
    var precioMin = document.getElementById('precioMin').value;
    var precioMax = document.getElementById('precioMax').value;

    var cartas = document.querySelectorAll('.itemCatalogo');

    //se añadio la parte del filtro de genero para que funcionara con ambos
    cartas.forEach(function (carta) {
        carta.style.paddingLeft = '15';
        carta.style.display = 'block';
        var generoCarta = carta.querySelector('.desc').innerText.toLowerCase();
        var precioCarta = parseFloat(carta.querySelector('#catalogoPrecioP').innerText.replace('$', ''));

        if ((filtroGenero === 'todos' || generoCarta === filtroGenero) && (precioCarta >= precioMin && precioCarta <= precioMax)) {
            carta.style.paddingLeft = '15';
            carta.style.display = 'block';
        } else {
            carta.style.display = 'none';
        }
    });
}