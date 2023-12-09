document.addEventListener('DOMContentLoaded', () => {
    const btnCart = document.querySelector(".iconoCarrito")
    const containerCartProducts = document.querySelector(".productosCarrito")

    btnCart.addEventListener('click', () => {
        containerCartProducts.classList.toggle('ocultarCarrito')
    })

    document.addEventListener('click', (e) => {
        // Busca el icono del carrito directamente
        if (e.target.matches('.carritoCatalogo i')) {
            const product = e.target.parentElement.parentElement;

            const id = product.querySelector('#catalogoIDP').textContent;
            const stock = product.querySelector('#catalogoStockP').textContent;
            const nombre = product.querySelector('#catalogoNombreP').textContent;
            const descripcion = product.querySelector('#catalogoDescripcionP').textContent;
            const categoria = product.querySelector('.desc').textContent;
            const precio = product.querySelector('#catalogoPrecioP').textContent;

            console.log('ID:', id);
            console.log('Stock:', stock);
            console.log('Nombre:', nombre);
            console.log('Descripción:', descripcion);
            console.log('Categoría:', categoria);
            console.log('Precio:', precio);
        }
    });
});

