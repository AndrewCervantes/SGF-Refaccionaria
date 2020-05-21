<?php
    require ("conexion.php");
    $productos = ($_POST['producto']);
    $descripciones = ($_POST['descripcion']);
    $cantidades = ($_POST['cantidad']);
    $precios = ($_POST['precio']);
    

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
    $valores='('+$pro+',"'+$des+'","'+$cant+'","'+$pre+'"),';

    //YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCION SUBSTR EN LA ULTIMA FILA//
    $valoresQ= substr($valores, 0, -1);

    }
    echo $valores;
    $sql= "INSERT INTO alumnos (, nombre, carrera, grupo) VALUES $valores";
    
?>