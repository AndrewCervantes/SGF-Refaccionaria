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
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" action="#" autocomplete="off" method="POST" >
            <input class="form-control mr-sm-2" type="text" placeholder="Consultar Inventario"  id="producto_id">
            <button class="btn btn-info my-2 my-sm-0" type="button" name="add" id="add">Agregar Producto</button>
          </form>
        </nav>

        <script type="text/javascript">
            /* Funcion buscador */
            $(document).ready(function(){
                var items = <?= json_encode($array) ?>
                
                $("#producto_id").autocomplete({
                    source: items
                });
            });
        </script>
        <div class="container">
            <input class="btn btn-info my-2 my-sm-0" id="b" type="button" onclick="window.print()" value="Imprime tu pdf">
            <input class="btn btn-info my-2 my-sm-0" type="text" value="Nueva Factura">
            <input class="btn btn-info my-2 my-sm-0" type="text" value="Generar Factura">
        </div>

        <!-- Factura -->
        <form name="add_name" id="add_name" class="container">
         <p id="sv">Super Vocho</p>
		        <p id="ubicacion">Carr. Fed.Méx - Pachuca km 32 Col. Loma Bonita, Tecamac, Edo. Mex</p>
		        <p id="Datos">Equipo: 1</p>
		        <p id="Datos">Fecha:
			        <script>
				        var f = new Date();
				        if (f.getMonth()<10) {
					        document.write(f.getDate() + "/0" + (f.getMonth() +1) + "/" + f.getFullYear());
				        }
				        else{
					        document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
				        }
			        </script>
		        </p>
		        <p id="Datos">Hora:
			        <script>
                        var d = new Date();
                        if(d.getMinutes()<10){
                            if(d.getHours()<10){
					        document.write("0"+ d.getHours() + ":" + (d.getMinutes() +1) + ":" + d.getSeconds());
				             }
				            else{
					        document.write(d.getHours() + ":0" + (d.getMinutes() +1) + ":" + d.getSeconds());
                            }   
                        }
				        else{
                            if(d.getHours()<10){
					            document.write("0"+ d.getHours() + ":" + (d.getMinutes() +1) + ":" + d.getSeconds());
				            }
				            else{
					            document.write(d.getHours() + ":" + (d.getMinutes() +1) + ":" + d.getSeconds());
                            }  
                        }
			        </script>
		        </p>
		        <p id="Datos">Numero de factura 
			        <script>
				        var i=1;
				        document.write(i)
			        </script>

		        </p>
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


        <!--Botones Externos al formulario-->
	
	
		

        <?php include("footer.php"); ?>
    </body>
</html>