<?php
    require ("conexion.php");
    $producto = $_POST['agregar'];
    if(empty($producto)){
        echo  '<script type="text/javascript">     
        alert("No se puede guardar un producto sin nombre");
        window.location.href="Inventario.php";
        </script>';
    }
    else {
        //$producto = utf8_decode($producto);
        //Insertar dato en MySQL
        $query = mysqli_query($conexion,"INSERT INTO producto(producto) VALUES ('$producto')");
    
        if (!$query) {
            exit();
        }
        else{
            echo  '<script type="text/javascript">     
            alert("Registro exitoso");
            window.location.href="Inventario.php";
            </script>';
        }
    }
?>

