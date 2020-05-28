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
        <link rel="stylesheet" type="text/css"  href="librerias/jquery-ui.css">
        <script src="librerias/jquery-1.12.1.min.js"></script>
        <script src="librerias/jquery-ui.js"></script>
        <script src="librerias/bootstrap/js/bootstrap.js"></script>
        <script src="librerias/alertifyjs/alertify.js"></script>
        <script src="js/funciones.js"></script>
        <script src='js/footer.js'></script>

        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/vochon.png">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script> 

    </head>
    <body>
        <?php include("header.php"); ?>
        <!-- Buscador -->
        <?php
            $consulta = mysqli_query($conexion,"SELECT * FROM producto");
            $array = array(); 
            if($consulta) {
                while ($row=mysqli_fetch_array($consulta)) {
                    $producto = $row['producto'];
                    //Guardando los productos en un arreglo
                    array_push($array,$producto);
                }
            } 
        ?>
        <div class="search">
        <div class="navbar navbar-light bg-light">
            <form class="form-inline" action="#" autocomplete="off" method="POST">
               <input class="form-control mr-sm-2" type="text" placeholder="Consultar Inventario" id="producto_id">
                <button class="btn btn-info my-2 my-sm-0" type="button" name="add" id="add">Agregar Producto</button>
            </form>
        </div>  
        </div>


        <script type="text/javascript">
            /* Funcion buscador */
            $(document).ready(function(){
                var items = <?= json_encode($array) ?>
                
                $("#producto_id").autocomplete({
                    source: items
                });
            });
        </script>
        <!-- Factura -->
        <div class="contenidofactura">
            <p id="sv">Super Vocho</p>
            <div class="encabezadoFactura">
                <form name="add_name" id="add_name" class="container" action="generar.php" method="POST"> 
                    <p id="ubicacion">Carr. Fed.Méx - Pachuca km 32 Col. Loma Bonita, Tecamac, Edo. Mex</p>
                    <p id="Datos">Equipo: 1</p>
                    <p>
                        <?php
                            // Obteniendo la fecha actual del sistema con PHP
                            date_default_timezone_set('America/Mexico_city');
                            $fecha = date("d-m-Y");
                            echo "Fecha: $fecha" . "\n";
                        ?>
                    </p>
                    <p>
                        <?php
                            date_default_timezone_set('America/Mexico_city');
                            $hora = date("H:i:s");
                            echo "Hora: $hora" . "\n";
                            ?>
                     </p>
                    <p id="Datos">Numero de factura: 
                        <?php
                            $query = mysqli_query($conexion, "SELECT  COUNT(id_nota) AS id FROM nota");
                            $result = mysqli_fetch_assoc($query);
                            $num = $result['id'] +1;
                        ?>
                        <b><?php echo $num; ?></b>

                    </p>
                    <input class="btn btn-info my-2 my-sm-0" type="submit" value="Generar Factura" id="submit">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamic_field">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>  
        </div>

        <!--Botones Externos al formulario-->
        <?php include("footer.php"); ?>
    </body>
</html>