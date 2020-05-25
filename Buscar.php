<?php
    require ("conexion.php");
    $salida=" ";
    $query= "SELECT * FROM producto";
    if(isset($_POST['consulta'])){
        $q = $conexion->real_escape_string($_POST['consulta']);
        $query = "SELECT id, producto FROM producto WHERE producto 
                    LIKE '%".$q."%' ";
    }   

    $resultado = $conexion->query($query);
    if($resultado->num_rows > 0){
        $salida.=   "<div class='scrollable'>
                        <table class='container' id='tabla'>
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <!--Table body-->
                                <tbody>";
        while($row= $resultado ->fetch_assoc()){
            $salida.= "             <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['producto']."</td>
                                        <td>
                                            <button  class='btn btn-outline-danger'  onclick='validacion_eliminar(".$row['id'].")'>Eliminar</button>
                                        </td>
                                    </tr> ";
        }
        $salida.="          </tbody>
                        </table>
                    </div>";

    }
    else{
        $salida.="No se enontro ese prodcuto";
    }
    echo $salida;
 

    
?>