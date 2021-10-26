$(document).ready(function(){
    $("#botonCrear").click(function(){
        $("#form")[0].reset();
        $(".modal-title").text("Crear Usuario");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
        $("#imagen_subida").html("");
    });

    var dataTable = $('#datos_usuario').dataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtener_registros.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0, 3, 4],
            "orderable": false
        }],
            "language": {
            "decimal": "",
            "emptyTable": "No hay registros",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });


    //CREAR USUARIO
    $(document).on('submit', '#form', function(event){

        event.preventDefault();
        var nombres = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var telefono = $('#telefono').val();
        var email = $('#email').val();
        var extension = $('#imagen_usuario').val().split('.').pop().toLowerCase();

        if(extension != ''){
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
                alert("Fomato de imagen inválido");
                $('#imagen_usuario').val('');
                return false;
            }
        }

        if(nombres != '' && apellidos != '' && email != ''){
            $.ajax({
                url:"crear.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    alert(data);
                    $('#form')[0].reset();
                    $('#modalUsuario').modal('hide');
                    dataTable.ajax.reload();// ✅ undefined
                }
            });
        }else{
            alert("Algunos campos son obligatorios");
        }
    });


    //Funcionalida de editar
    $(document).on('click', '.editar', function(){		
        var id_usuario = $(this).attr("id");		
        $.ajax({
            url:"obtener_registro.php",
            method:"POST",
            data:{id_usuario:id_usuario},
            dataType:"json",
            success:function(data)
            {
                //console.log(data);				
                $('#modalUsuario').modal('show');
                $('#nombre').val(data.nombre);
                $('#apellidos').val(data.apellidos);
                $('#telefono').val(data.telefono);
                $('#email').val(data.email);
                $('.modal-title').text("Editar Usuario");
                $('#id_usuario').val(id_usuario);
                $('#imagen_subida').html(data.imagen_usuario);
                $('#action').val("Editar");
                $('#operacion').val("Editar");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        })
    });



    //Funcionalida de borrar
    $(document).on('click', '.borrar', function(){
        var id_usuario = $(this).attr("id");
        if(confirm("Esta seguro de borrar este registro: " + id_usuario)){
            $.ajax({
                url:"borrar.php",
                method:"POST",
                data:{id_usuario:id_usuario},
                success:function(data)
                {
                    alert(data);
                    dataTable.ajax.reload();
                }
            });
        }
        else{
            return false;	
        }
    });
});


