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
        <div class="filtro">
            <label for="filtroGenero">Filtrar por género:</label>
            <select id="filtroGenero">
                <option value="todos">Todos</option>
                <option value="hombres">Hombres</option>
                <option value="mujer">Mujeres</option>
            </select>
        </div>
       <br>
    </div>

    <script>
        document.getElementById('filtroGenero').addEventListener('change', function() {
            
            var filtro = this.value;
            var cartas = document.querySelectorAll('.cartaPrincipal');

            cartas.forEach(function(carta) {
                carta.style.paddingLeft = '72';
                carta.style.display = 'block';
                var generoCarta = carta.querySelector('.desc').innerText.toLowerCase();
                
                if (filtro === 'todos' || generoCarta === filtro) {
                    carta.style.paddingLeft = '72';
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