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
                quantity:1,
                id: product.querySelector('#catalogoIDP').textContent,
                stock: product.querySelector('#catalogoStockP').textContent,
                nombre: product.querySelector('#catalogoNombreP').textContent,
                descripcion: product.querySelector('#catalogoDescripcionP').textContent,
                categoria: product.querySelector('.desc').textContent,
                precio: product.querySelector('#catalogoPrecioP').textContent,
            };

            const exist = allProducts.some(product => product.nombre === infoProduct.nombre)

            if(exist){
                const products = allProducts.map(product => {
                    if(product.nombre === infoProduct.nombre){
                        product.quantity++;
                        return product
                    }else{
                        return product
                    }
                })
                allProducts = [...products]
            }else{
                allProducts = [...allProducts,infoProduct]
            }

           

            showHTML();

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
            containerCartProducts.innerHTML=`
                <p class ="cart-empty"> Carrito Vacio </p>
            `
        }
        
        //Limpiar HTML

        rowProduct.innerHTML=``

        let total = 0;
        let totalOfProducts = 0;
        
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

        });

        valorTotal.innerText = `$${total}`;
        countProducts.innerText = totalOfProducts;

    };

});