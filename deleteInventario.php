<?php
    require ("conexion.php");
    $id = $_POST['id'];
    echo $query = mysqli_query($conexion,"DELETE FROM producto WHERE id='$id'");

?>