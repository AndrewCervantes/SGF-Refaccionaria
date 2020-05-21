<?php
    try {
        //code...
        $conexion = mysqli_connect('127.0.0.1','root', '','refaccionaria');
        $r=1;
        /*Prueba
        $consulta = $conexion->query('SELECT * FROM producto');
        foreach ($consulta as $fila) {
            echo $fila['producto'].'<br />';
        }*/

    } catch (PDOException $e) {
        //throw $th;
        echo "Error: " . $e->getMessage();
    }


    

?>