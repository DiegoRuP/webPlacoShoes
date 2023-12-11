document.addEventListener('DOMContentLoaded', () => {
    const btnCart = document.querySelector(".iconoCarrito")
    const containerCartProducts = document.querySelector(".productosCarrito")
    const rowProduct = document.querySelector('.row-product')

    btnCart.addEventListener('click', () => {
        containerCartProducts.classList.toggle('ocultarCarrito')
    })


    let allProducts = []

    

    const valorTotal = document.querySelector('.totalPago')
    const countProducts = document.querySelector('#contador')



    document.addEventListener('click', (e) => {
        // Busca el icono del carrito directamente
        if (e.target.matches('.carritoCatalogo i')) {
            const product = e.target.parentElement.parentElement;

            const infoProduct = {
                quantity: 1,
                id: product.querySelector('#catalogoIDP').textContent,
                stock: parseInt(product.querySelector('#catalogoStockP').textContent.slice(7)), // Elimina 'Stock: ' y convierte a número
                nombre: product.querySelector('#catalogoNombreP').textContent,
                descripcion: product.querySelector('#catalogoDescripcionP').textContent,
                categoria: product.querySelector('.desc').textContent,
                precio: product.querySelector('#catalogoPrecioP').textContent,
            };

            console.log(infoProduct.stock);

            // Verifica si hay suficiente stock
            if (infoProduct.stock > 0) {
                const existingProduct = allProducts.find((product) => product.id === infoProduct.id);

                if (existingProduct) {
                    if (existingProduct.quantity < infoProduct.stock) {
                        existingProduct.quantity++;
                    } else {
                        // Muestra la alerta SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Sin stock',
                            text: 'No hay suficiente stock para este producto.',
                        });
                        return; // No añadir al carrito si no hay suficiente stock
                    }
                } else {
                    allProducts.push(infoProduct);
                }

                showHTML();
            } else {
                // Muestra la alerta SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Sin stock',
                    text: 'No hay suficiente stock para este producto.',
                });
            }
        }
    });
    
    


    rowProduct.addEventListener('click', (e) => {
        if (e.target.matches('.itemCarrito i')) {
            const product = e.target.parentElement;     
            const title = product.querySelector('p').textContent;

            allProducts = allProducts.filter(product => product.nombre !== title );

            console.log(allProducts)

            showHTML();
        }
    })

    //funcion para mostrar

    const showHTML = () => {
        
        if(!allProducts.length){
            const emptyCartMessage = document.createElement('div');
            emptyCartMessage.classList.add('itemCarrito', 'empty-cart');
            emptyCartMessage.innerHTML = `
                <div class="infoCarrito">
                    <span class="cantItem"></span>
                    <p class="tituloItem">Carrito Vacío</p>
                    <p class="precioItem"></p>
                </div>
            `;
            rowProduct.appendChild(emptyCartMessage);
        }
        
        //Limpiar HTML

        rowProduct.innerHTML=``

        let total = 0;
        let totalOfProducts = 0;
        

        const nombres = [];
        const cantidad = [];

        allProducts.forEach(product => {
            const containerProduct = document.createElement('div')
            containerProduct.classList.add('itemCarrito')
            containerProduct.innerHTML = `
                <div class="infoCarrito">  <!-- info-cart-product -->
                    <span class="cantItem">  ${product.quantity}   </span>
                    <p class="tituloItem">${product.nombre}</p>
                    <span class="precioItem"> ${product.precio} </span>
                </div>
                <i class="fa-solid fa-xmark fa-lg" id="iconoCerrar"></i> 
            `
            rowProduct.append(containerProduct);
            total = total + parseInt(product.quantity * product.precio.slice(1));
            totalOfProducts = totalOfProducts + product.quantity;

            nombres.push(product.nombre);
            cantidad.push(product.quantity);

            
        });
        

        valorTotal.innerText = `$${total}`;
        countProducts.innerText = totalOfProducts;

        const nombresJSON = JSON.stringify(nombres);
        // Boton Finalizar Compra
        const finalizarCompraBtn = document.createElement('button');
        finalizarCompraBtn.classList.add('finalizarCompraBtn');
        finalizarCompraBtn.textContent = 'Finalizar Compra';
        //Estilos a boton finalizar compra
        
        finalizarCompraBtn.style.padding = '10px 20px';
        finalizarCompraBtn.style.color = '#289bb8';
        finalizarCompraBtn.style.backgroundColor = '#101416';
        finalizarCompraBtn.style.marginTop = '8px';
        finalizarCompraBtn.style.marginLeft = '115px';
        finalizarCompraBtn.style.borderRadius = '5px';

        document.body.appendChild(finalizarCompraBtn);

        finalizarCompraBtn.addEventListener('click', () => {
            // Crear un formulario oculto
            const form = document.createElement('form');
            form.action = 'finalizar_compra.php';
            form.method = 'post';
        
            // Crear campos de entrada para los datos
            const quantityInput = document.createElement('input');
            quantityInput.type = 'hidden';
            quantityInput.name = 'quantity';
            quantityInput.value = cantidad;
        
            const totalInput = document.createElement('input');
            totalInput.type = 'hidden';
            totalInput.name = 'total';
            totalInput.value = total;
        
            const nombreInput = document.createElement('input');
            nombreInput.type = 'hidden';
            nombreInput.name = 'nombre';
            nombreInput.value = nombresJSON;            
        
            // Agregar los campos al formulario
            form.appendChild(quantityInput);
            form.appendChild(totalInput);
            form.appendChild(nombreInput);
        
            // Agregar el formulario al documento y enviarlo
            document.body.appendChild(form);
            form.submit();
        });

        rowProduct.append(finalizarCompraBtn);

    };

});