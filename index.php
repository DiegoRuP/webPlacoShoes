<?php include 'navbar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pagina principal - Placo Shoes</title>
</head>
<body>
    <br>
    <div class="contenedorPrincipal">
        <div class="seccionPortada">
            <h2>Placo Shoes</h2>
        </div>
        <h1>REGALOS PARA TOD@S</h1>
        <p>Más que alegría, regala algo extra: un nuevo hábito o el inicio de una nueva colección.
        Este año, da un regalo que convierta el siguiente año en uno mejor. </p>
        <br>
        <div class="collage">
            <div class="mujer"><a href="catalogo.php"> <button>Mujer</button></a> </div>
            <div class="hombres"><a href="catalogo.php"> <button>Hombre</button></a> </div>
            <div class="chavo"><a href="catalogo.php"> <button>Catalogo</button></a></div>
        </div> 
        <h1>LOS MAS VENDIDOS</h1>
        <p> Te mostramos las mejores opciones que podrías encontrar a un excelente precio</p>

        <div class="cartaPrincipal">
            <ul>
                <li>
                <div class="shop-card">
                <div class="title">
                    Nike Air Jordan 1 HIGH x Travis Scott
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
                    <div class="price">$30400</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Nike Air Jordan 1 HIGH Rosa y blanco
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
                    <div class="price">$2599</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
                <li>
                <div class="shop-card">
                <div class="title">
                    Nike Air Jordan 1 HIGH x Spider-Man
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
                    <div class="price">$5240</div>
                    <button class="btnCard">Añadir al carrito<span class="bg"></span></button>
                </div>
                </li>
            </ul>
            
        </div>
    
        </div>
        <br>
        <?php include 'carrusel.php'?>
        <br>
    </div>
    
</body>

<?php include 'footer.php'?>

</html>
