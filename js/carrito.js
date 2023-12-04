const btnCarrito = document.querySelector(".iconoCarrito");
const productosCarrito = document.querySelector(".productosCarrito");

btnCarrito.addEventListener('click', () => {
    productosCarrito.classList.toggle('ocultarCarrito');
});
