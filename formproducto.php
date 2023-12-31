<?php
  include 'navbar.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - PlacoShoes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="css/formproducto.css" rel="stylesheet">
  <script src="script.js"></script>
</head>
<body>
  <div class="d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center" style="margin:20px;">
      <div class="col-lg-6 col-md-8 caja-login">
        <div class="col-lg-12 caja-titulo">
          Control de producto
        </div>
        <div class="col-lg-12 login-form">

          <form action="alta.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">       
              <label class="form-control-label">ID del producto</label>
              <input type="text" class="form-control" name="idProducto" id="idProducto" required>
            </div>

            <div class="form-group">
              <label class="form-control-label">Nombre del producto</label>
              <input type="text" class="form-control" name="nombreProducto" id="nombreProducto" required>
            </div>

            <div class="form-group">
              <label class="form-control-label">Descripcion</label>
              <textarea name="descripcion" id="descripcion" cols="36 " rows="10" required></textarea>
            </div>

            <div class="form-group">
              <label class="form-control-label">Categoria</label>
              <input type="text" class="form-control" name="categoriaProducto" id="categoriaProducto" required>
            </div>

            <div class="form-group">
              <label class="form-control-label">Stock</label>
              <input type="text" class="form-control" name="stock" id="disponibleProducto" required>

            </div>

            <div class="form-group">
              <label class="form-control-label">Precio</label>
              <input type="text" class="form-control" id="precioProducto" name="precioProducto" required>
            </div>
            <div class="form-group">
            <label class="form-control-label">Foto del producto</label>
              <label for="imagen" class="upload-btn">
                <span id="label-imagen">Selecciona una imagen</span>
              </label>
              <input type="file" id="imagen" name="imagen" style="display: none;" onchange="mostrarNombreArchivo()" required>
            </div>

            <div class="form-group">
              <label class="form-control-label">Descuento</label>
              <input type="text" class="form-control" name="descuentoProducto" id="descuentoProducto" required>
            </div>

            <div class="col-12 login-btm login-button justify-content-center d-flex">
              <button type="submit" class="btn btn-outline-primary" id="alta">Alta Producto</button>
              <button type="button" class="btn btn-outline-primary" id="actualizar" onclick="window.location.href='cambios.php';">Actualizar Datos</button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<script src="js/formproducto.js"></script>

</body>

<?php include 'footer.php'?>
</html>