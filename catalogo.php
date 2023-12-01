<?php include 'navbar.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo - Placo Shoes</title>
</head>
<body>
    <br>
    <div class="filtro">
        <label for="filtroGenero">Filtrar por género:</label>
        <select id="filtroGenero">
            <option value="todos">Todos</option>
            <option value="hombres">Hombres</option>
            <option value="mujeres">Mujeres</option>
        </select>
    </div>
    
    <div class="contenedorCatalogo">
       <br>
       <div class="cartaPrincipal">
            <ul>
                <li>
                <div class="shop-card">
                    <div class="title">
                        Nike Travis
                    </div>
                <div class="desc">
                    Hombres
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/hombre1.png" alt="hombre1" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$21000</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Nike
                </div>
                <div class="desc">
                    Mujer
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/mujer1.png" alt="mujer1" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$3099</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Nike
                </div>
                <div class="desc">
                    Hombres
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/hombre7.png" alt="hombre7" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$2699</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                
            </ul>
        </div>
        
        <div class="cartaPrincipal">
            <ul>
                <li>
                <div class="shop-card">
                    <div class="title">
                        Vans
                    </div>
                <div class="desc">
                    Hombres
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/hombre2.png" alt="hombre2" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$1600</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Nike
                </div>
                <div class="desc">
                    Mujer
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/mujer2.png" alt="mujer2" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$2800</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Converse
                </div>
                <div class="desc">
                    Mujer
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/mujer3.png" alt="mujer3" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$2200</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                    
            </ul>
        </div>

        <div class="cartaPrincipal">
            <ul>
                <li>
                <div class="shop-card">
                    <div class="title">
                        Converse
                    </div>
                <div class="desc">
                    Mujer
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/mujer4.png" alt="mujer4" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$1600</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Converse
                </div>
                <div class="desc">
                    Mujer
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/mujer5.png" alt="mujer5" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$2150</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Gucci
                </div>
                <div class="desc">
                    Mujer
                </div>
                <div class="slider">
                    <figure>
                        <img src="media/mujer6.png" alt="mujer6" height="200px">
                    </figure>
                </div>

                <div class="cta">
                    <div class="price">$19000</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                    
            </ul>
        </div>

        <!-- Termina contenedor catalogo -->
    </div>

    <script>
        document.getElementById('filtroGenero').addEventListener('change', function() {
            var filtro = this.value;
            var cartas = document.querySelectorAll('.cartaPrincipal');

            cartas.forEach(function(carta) {
                var generoCarta = carta.querySelector('.desc').innerText.toLowerCase();
                
                if (filtro === 'todos' || generoCarta === filtro) {
                    carta.style.display = 'block';
                } else {
                    carta.style.display = 'none';
                }
            });
        });
    </script>
    


    <br>
    <?php include 'carrusel.php'?>
    <br>
</body>
<?php include 'footer.php'?>
</html>