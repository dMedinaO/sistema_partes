$(window).on('load', function() {

	listar();
	eliminar();
	//editar();
	guardar();
    guardarMasivo();

});

$.fn.DataTable.ext.pager.numbers_length = 5;

var listar = function(){
    //users -> nombre de la tabla definida en el tag HTML
	var t = $('#user_systems').DataTable({
		"responsive": true,
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url": "../controllers/cadete_controller/show_data.php" //llamada por ajax a php
		},
		"columns":[//agregar campos a la tabla segun nombre 
			{"data":"numero_orden"},
			{"data":"nombre_cadete"},
			{"data":"company"},
			{"data":"seccion"},
            {"data":"fecha_agregado"},
            //informacion de campos default para hacer CRUD -> editar/eliminar registros
			{"defaultContent": "<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}
		]
	});

	//funciones auxiliares al momento de pinchar un boton de la tabla
	obtener_id_eliminar("#user_systems tbody", t);
}

var obtener_id_eliminar = function(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
		var id_user = $("#frmEliminar #id_user").val( data.numero_orden );
	});
}

//elimina registros
var eliminar = function(){
	$("#eliminar-usuario").on("click", function(){
		var id_user = $("#frmEliminar #id_user").val();
		$.ajax({
			method:"POST",
			url: "../controllers/cadete_controller/remove_data.php",
			data: {//los parametros a pasar en el metodo al script de eliminar
					"id_user": id_user
			}
		}).done( function( info ){//cuando termina la llamada asincrona se ejecuta esta seccion
			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			location.reload(true);
		});
	});
}

var guardar = function(){
	$("#agregar-usuario").on("click", function(){

		var numero_orden = $("#frmAgregar #numero_orden").val();
        var username = $("#frmAgregar #username").val().toUpperCase();
        var company = $("#frmAgregar #company").val();
        var seccion = $("#frmAgregar #seccion").val();

		$.ajax({
			method: "POST",
			url: "../controllers/cadete_controller/add_data.php",
			data: {
					"numero_orden"   : numero_orden,
                    "username" : username,
                    "company" :	company,
                    "seccion" : seccion											
			}

		}).done( function( info ){

			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			location.reload(true);
		});
	});
}


var guardarMasivo = function(){
    $("#agregar-masiva").on("click", function(){
        $('#loading').show();
        var compania = $("#frmAgregarMasiva #compania").val();

        $.ajax({
            method: "POST",
            url: "../controllers/cadete_controller/addDataMasiva.php",
            data: {
                "compania"   : compania
            }

        }).done( function( info ){

            var json_info = JSON.parse( info );
            console.log(json_info);
            if (json_info.process="OK"){
                $('#loading').hide();
                $('#okResponse').show();
                setTimeout("location.href=''", 5000);

            }else{
                $('#loading').hide();
                $('#errorResponse').show();
                setTimeout("location.href=''", 5000);
            }
        });
    });
}