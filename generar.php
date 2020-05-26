<?php
    require ("conexion.php");
    $productos = ($_POST['producto']);
    $descripciones = ($_POST['descripcion']);
    $cantidades = ($_POST['cantidad']);
    $precios = ($_POST['precio']);
    $total = 0;
    $importe = 0;
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
    <div class="gen">

    <h4 class="gen">Domicilio Fiscal:</h4>
    <p id="ubicacion">Carr. Fed.Mex - Pachuca km 32 </p>
    <p>Col. Loma Bonita, Tecamac, Edo. Mex</p>
    <p>MOIR7004139D0</p>
    <P>24-89-02-61</P>
    </div>

    <p id="sv"> --------------------------------------------------------------</p>

    <h4 id="sv">---------------------- Super Vocho ------------------------</h4>
    <p id="Datos">Tienda No: 01</p>
    <p id="Datos">Caja: 01</p>
    <p id="Datos">Nota de vta:01</p>
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
            if(d.getHours()<10){
                document.write("0"+ d.getHours() + ":" + (d.getMinutes() +1) + ":" + d.getSeconds());
            }
            else{
                document.write(d.getHours() + ":" + (d.getMinutes() +1) + ":" + d.getSeconds());
            }
        </script>
    </p>
    <p id="Datos">Numero de factura 
        <script>
            var i=1;
            document.write(i)
        </script>

    </p>

    <!-Tabla de productos-->
    <table>
        <thead>
            <td id="producto" class="pro">Producto &nbsp</td>
            <td id="cant">Cantidad &nbsp</td>
            <td id="precio">Precio &nbsp</td>
            <td id="total">Importe &nbsp</td>
        </thead>
        <tbody>
        
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
				<td id="precio" style="text-align: center;"><?php echo $pre;   ?></td>
				<td id="importe" style="text-align: center;">$ <?php echo $imp;0 ?>.00</td>
                <p id="sv">--------------------------------------------------------------</p>
			</tr>
            
        <?php



        if($producto === false && $descripcion === false && $cantidad === false && $precio === false){
            break;
        }
        
    }
?>
    </tbody>
		</table>
		<p id="sv">--------------------------------------------------------------</p>
		<p id="sv">Total												$ <?php echo $total;?>.00	</p>
		<p id="sv">Doscientos Cuarenta Pesos</p>
		<p id="sv">------------------Gracias por su compra-------------------</p>		

		
		
		
	</form>

	<!-Botones Externos al formulario-->
	<p id="bo">
		<input id="b" type="button" onclick="window.print()" value="Imprime tu pdf">
	</p>

</body>
        </html>
<?php
    
    $sql= "INSERT INTO alumnos (, nombre, carrera, grupo) VALUES $valores";
    
?>