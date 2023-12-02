<?php include 'navbar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Placo Shoes</title>
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
          <form>
            <div class="form-group">

              <!-- EL ID NOS PUEDE AYUDAR A IDENTIFICAR LA CATEGORIA, POR EJEMPLO SI EMPIEZA EN 1 ES HOMBRE Y SI EMPIEZA EN 2 ES MUJER 
            ejemplo: 2233 Es una teni de mujer 
            ejemplo: 1242 Es un teni de hombre -->
            
              <label class="form-control-label">ID del producto</label>
              <input type="text" class="form-control" id="nombreProducto">
            </div>

            <div class="form-group">
              <label class="form-control-label">Nombre del producto</label>
              <input type="text" class="form-control" id="nombreProducto">
            </div>

            <div class="form-group">
              <label class="form-control-label">Descripcion</label> <br> <br>
              <textarea name="descripcion" id="" cols="58 " rows="2"></textarea>
            </div>

            <div class="form-group">
              <label class="form-control-label">Cuantos productos se encuentran disponibles</label>
              <input type="text" class="form-control" id="disponibleProducto" >
            </div>

            <div class="form-group">
              <label class="form-control-label">Precio</label>
              <input type="text" class="form-control" id="precioProducto">
            </div>
            <div class="form-group">
            <label class="form-control-label">Foto del producto</label> <br> <br>
              <label for="imagen" class="upload-btn">
                <span id="label-imagen">Selecciona una imagen</span>
              </label>
              <input type="file" id="imagen" name="imagen" style="display: none;" onchange="mostrarNombreArchivo()">
            </div>

            <div class="form-group">
              <label class="form-control-label">Descuento</label>
              <input type="text" class="form-control" id="disponibleProducto" >
            </div>

            <div class="col-12 login-btm login-button justify-content-center d-flex">
            <button type="submit" class="btn btn-outline-primary" id="alta">Alta</button>
            <button type="submit" class="btn btn-outline-primary" id="actualizar" href="cambios.php">Actualizar datos</button>
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