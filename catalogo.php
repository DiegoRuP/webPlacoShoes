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
    <div class="contenedorCatalogo">
       
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
    
        </div>
       
    </div>
    <br>
    <?php include 'carrusel.php'?>
    <br>
</body>
<?php include 'footer.php'?>
</html>