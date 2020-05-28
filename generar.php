<?php
    require ("conexion.php");
    $productos = ($_POST['producto']);
    $descripciones = ($_POST['descripcion']);
    $cantidades = ($_POST['cantidad']);
    $precios = ($_POST['precio']);
    $total = 0;
    $importe = 0;

    if(empty($producto)&& empty($cantidades) && empty($precios)){
        echo  '<script type="text/javascript">     
        alert("No se puede generar una nota");
        window.location.href="Factura.php";
        </script>';
    }
    else {
    

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/generar.css">
        <title>Document</title>
    </head>
    <body>



<!--Formulario-->
<form id="formulario" style="font-size: 11px;" >
    <div class="gen" style="width:270px; text-align:center;">
    <br>
    <img src="vochon.png" style="width:70px; height:70px;">
    <h3 id="sv">------------ Super Vocho -------------</h3>
    <h4 class="gen">Domicilio Fiscal:</h4>
    <p id="ubicacion">Carr. Fed.Mex - Pachuca km 32 <br>Col. Loma Bonita, Tecamac, Edo. Mex<br>MOIR7004139D0<br>24-89-02-61</p>
  
    </div>

    <h3 id="sv"> ---------------------------------------</h3>

   
    <p id="Datos">Tienda No: 01</p>
    <p id="Datos">Caja: 01</p>
    <p id="Datos">Nota de vta:01</p>
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
    </p>
    <p id="Datos">Numero de factura: 
        <?php
            $query = mysqli_query($conexion, "SELECT  COUNT(id_nota) AS id FROM nota");
             $result = mysqli_fetch_assoc($query);
            $num = $result['id'] +1;
        ?>
        <b><?php echo $num; ?></b>

    </p>

    <!-Tabla de productos-->
    <table>
        <thead>
            <td id="producto" class="pro">Producto&nbsp</td>
            <td id="cant">Cantidad &nbsp</td>
            <td id="precio">Precio &nbsp</td>
            <td id="total">Importe &nbsp</td>
        </thead>
        <tbody>
        <h3 id="sv"> ---------------------------------------</h3>
        
<?php
    ////SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (PRODUCTO, DESCRIPCION, CANTIDAD, PRECIO)////
    while(true){

        //RECUPERAR LOS VALORES DE LOS ARREGLOS//
        $producto = current($productos);
        $descripcion = current($descripciones);
        $cantidad = current($cantidades);
        $precio = current($precios);

        //ASIGNARLOS A VARIABLES//
        $pro=(($producto !== false)? $producto :", &nbsp;");
        $des=(($descripcion !== false)? $descripcion :", &nbsp;");
        $cant=(($cantidad !== false)? $cantidad :", &nbsp;");
        $pre=(($precio !== false)? $precio :", &nbsp;");

        //CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCION//
        $valores='("'.$pro.'","'.$des.'","'.$cant.'","'.$pre.'"),';

        //YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCION SUBSTR EN LA ULTIMA FILA//
        $valoresQ= substr($valores, 0, -1);
        //echo $valores;
        $producto = next($productos);
        $descripcion = next($descripciones);
        $cantidad = next($cantidades);
        $precio = next($precios);


        intval($cant);
        intval($pre);
        $imp = $cant * $pre;
        //$importe = $importe + $imp;

        intval($imp);
        $total=$total+$imp;

        ?>
       
			<tr>
				<td id="producto" style="text-align: center;"  class="pro"><?php echo $pro; ?> <br><?php echo $des; ?></td>
				<td id="cant" style="text-align: center;"><?php  echo $cant;   ?></td>
               
                        
				<td id="precio" style="text-align: center;">$<?php echo number_format($pre, 2, ",", ""); ?></td>
                <td id="importe" style="text-align: center;">$ <?php echo number_format($imp, 2, ",", "");?></td>
                


                
			</tr>
            
        <?php
        //Query de ingresar datos //
        /*$query = mysqli_query($conexion, "INSERT INTO vendidos (producto, descripcion, cantidad, precio) VALUES ('$valores')");
        //$query = mysqli_query($conexion,"INSERT INTO producto(producto) VALUES ('$producto')");
        if (!$query) {
            echo  '<script type="text/javascript">     
            alert("Mal");
            
            </script>';
        }
        else{
            echo  '<script type="text/javascript">     
            alert("Registro exitoso");
            
            </script>';
        }
        //  sqlRes = $conexion -> mysqli_query($sql);
        */
        if($producto === false && $descripcion === false && $cantidad === false && $precio === false){
            break;
        }
        
    }
?>
    </tbody>
		</table>
		<h3 id="sv"> ---------------------------------------</h3>
		<p id="sv">Total:												$ <?php echo number_format($total, 2, ",", "");?>	</p>
		<h3 id="sv">-------" Gracias por su compra "--------</h3>		

		
	</form>
    <?php
        $query = mysqli_query($conexion,"INSERT INTO nota( fecha, hora, total) VALUES('$fecha','$hora','$total')");
    ?> 

	<!--Botones Externos al formulario-->
	<p id="bo">
		<input id="b" type="button" onclick="window.print()" value="Imprime tu pdf">
	</p>
        <input id="b" type="button"  onclick="nuevaNota()" value="Nueva Factura">
</body>
</html>
<script>
        function nuevaNota(){
       //reload pagnia de inicio
            location.href="Factura.php";
        }
        </script>

<?php
    }
?>