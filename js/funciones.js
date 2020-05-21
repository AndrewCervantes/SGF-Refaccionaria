
/* Funciones de Inventario */
function validacion_eliminar(id){
    alertify.confirm('Eliminar producto', '¿Está seguro de eliminar este producto?', 
    function(){ eliminar(id)}, 
    function(){ 
        alertify.error('Cancelado')
    });
}

function eliminar(id){
    elemento ="id=" + id;
    $.ajax({
        type:"POST",
        url:"./deleteInventario.php",
        data:elemento,
        success:function(r){
            if(r==1){
                //$('#tabla').load('Inventario.php');
                alertify.success("Eliminado con Exito!");
                location.href="./Inventario.php";
                alert("Registro elimnado con exito");
            }
            else{
                alertify.error("Fallo el servidor");
            }

        }
    });
}

$(buscar_datos());

function buscar_datos(consulta) {
    $.ajax({
        url: "./Buscar.php", 
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function (respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function () {
        console.log("error");
    })  
}
$(document).on('keyup','#id_busqueda', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_datos(valor);
    }
    else{
        buscar_datos();
    }

});


/* Funciones de Facturas */
$(document).ready(function(){
    var i = 1;
    $('#add').click(function () {
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'">' +
                                                '<td><input class="form-control" type="text" name="producto[]" disabled="disabled"> </td>' +
                                                '<td><input class="form-control" type="text" name="descripcion[]"></td>' +
                                                '<td><input class="form-control" type="text" name="cantidad[]"></td>'+
                                                '<td><input class="form-control" type="text" name="precio[]"></td>'+
                                                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                '</tr>');
    });
                
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
            $('#row'+ id).remove();
        });
        
        $('#submit').click(function(){
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data){
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
})



