var contadorg;
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
    var i = 0;
    var j = 0;
    var contador = 0;
    $('#add').click(function () {
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'">' +
                                                '<td><input class="form-control" id="producto'+i+'" type="text" name="producto[]"  ></td>' +
                                                '<td><input class="form-control" id="descripcion'+i+'" type="text" name="descripcion[]"></td>' +
                                                '<td><input class="form-control" id="cantidad'+i+'" type="text"name="cantidad[]" onkeypress="solonumeros(event);" ></td>'+
                                                '<td><input class="form-control" id="precio'+i+'" type="text" name="precio[]" onkeypress="solonumeros(event);"></td>'+
                                                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                '</tr>');
        var nombre = document.getElementById("producto_id").value;
        console.log(document.getElementById("producto"+i));
        document.getElementById("producto"+i).value = nombre;

        //Funcion para importe
        /*
        function total(){
            var cantidad=document.getElementById('cantidad'+i).value;
            var precio=document.getElementById('precio'+i).value;
            var total=cantidad*precio;
            document.getElementById('importe'+i).value = total;
        }
        //funcion para ejecutar el importe
        setInterval(function(){
            total();
        },100);*/
    });
                
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
            $('#row'+ id).remove();
        });
        
        $('#submit').click(function(){
            $.ajax({
                url:"generar.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data){
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
})


    
function solonumeros(e){
         var key = window.event ? e.which : e.keyCode;
                        if(key < 46 || key > 57 ||key ==47){
                            e.preventDefault();
                                    alertify.error("Favor de introducir un numero",2.5);                               
                        }
                    }

