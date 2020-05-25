<?php
    require ("conexion.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Sistema de inventario">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de refaccionaria</title>
        <!-- Importando  bootstrap, Jquery, alertify-->
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css"  href="librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css"  href="librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/vochon.png"> 
    </head>
    <body >
      <!-- Header  -->
        <?php include("header.php"); ?>
      <!-- Busqueda  -->
      <div class="search2">
        <div class="navbar navbar-light bg-light">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="text" placeholder="Busqueda" name="busqueda" id="id_busqueda">
            <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
          </form>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add">Agregar
          </button>
        </div>
      </div>

        <div id="datos"></div>
      <!-- Footer  -->       
      <?php include("footer.php"); ?>
    </body>
    <script src="librerias/jQuery-3-5-1-min.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="js/funciones.js"></script>
    <script src='js/footer.js'></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</html>


<!-- Modal para agregar -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="ad" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
      </div>
      <div class="modal-body">
        <form action="saveInventario.php" method="post">
          <input class="form-control mr-sm-2" type="text" name ="agregar" placeholder ="Nombre del Producto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar </button>
        <input type="submit" class="btn btn-success" value="Guardar">
      </form>
      </div>
    </div>
  </div>
</div>