<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos</title>
    <link rel="stylesheet" href="css/contacto.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart1);

        function drawChart1() {
            <?php
            $conexion = mysqli_connect("localhost", 'placoTest', 'testPlacoPass', "bdplacoshoes");
            if (mysqli_connect_errno()) {
                die("Conexión fallida: " . mysqli_connect_error());
            }
            $query = "SELECT SUBSTRING_INDEX(Nombre, ' ', 1) as Marca, SUM(Stock) as TotalStock FROM productos GROUP BY Marca";
            $result = mysqli_query($conexion, $query);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = array($row['Marca'], (int)$row['TotalStock']);
            }
            mysqli_close($conexion);
            ?>

            var jsonData = <?php echo json_encode($data); ?>;
            var data = google.visualization.arrayToDataTable([
                ['Marca', 'Stock'],
                <?php
                foreach ($data as $row) {
                    echo "['" . $row[0] . "', " . $row[1] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Stock por Marca',
                is3D: true,
                backgroundColor: 'transparent',
                titleTextStyle: { color: '#03a9f5' },
                legend: { textStyle: { color: '#03a9f5' } }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            <?php

            $conexion = new mysqli("localhost", 'placoTest', 'testPlacoPass', "bdplacoshoes");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            $query = "SELECT Nombre, Precio FROM productos";
            $result = $conexion->query($query);

            $data = "['Producto', 'Precio'],";
            while ($row = $result->fetch_assoc()) {
                $nombre = $row['Nombre'];
                $precio = $row['Precio'];
                $data .= "['$nombre', $precio],";
            }

            $conexion->close();
            ?>

            var data = google.visualization.arrayToDataTable([
                <?php echo $data; ?>
            ]);

            var options = {
                title: 'Precios de Productos',
                chartArea: {width: '50%'},
                hAxis: {
                    title: 'Precio',
                    minValue: 0,
                    textStyle: { color: '#03a9f5' }
                },
                vAxis: {
                    title: 'Producto',
                    textStyle: { color: '#03a9f5' }
                },
                backgroundColor: 'transparent',
                titleTextStyle: { color: '#03a9f5' },
                legend: { textStyle: { color: '#03a9f5' } },
                colors: ['#427D9D']
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <br>
    <div class="contenedorGraficas">
        <br>
        <h2 class="titulo">PlacoGrafica</h2>    
        <div class="contenedorGraficas2">
            <div id="piechart_3d" style="width: 850px; height: 1000px;"></div>
            <div id="chart_div" style="width: 1100px; height: 900px;"></div>
        </div>
    </div>
    <br>
</body>
<?php include 'footer.php'; ?>
</html>