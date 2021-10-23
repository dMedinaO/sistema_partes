$(window).on('load', function() {

	listar();
	eliminar();
	guardar();

});

$.fn.DataTable.ext.pager.numbers_length = 5;

var listar = function(){
    //users -> nombre de la tabla definida en el tag HTML
	var t = $('#detalles').DataTable({
		"order": [[ 1, "asc" ]],
		"responsive": true,
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url": "../controllers/detalle_controller/show_data.php" //llamada por ajax a php
		},
		"columns":[//agregar campos a la tabla segun nombre 
			{"data":"id_detalle"},
			{"data":"valor_detalle"},
			{"defaultContent": "<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}
		]
	});
//funciones auxiliares al momento de pinchar un boton de la tabla
obtener_id_eliminar("#detalles tbody", t);
}

var obtener_id_eliminar = function(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
		var id_detalle = $("#frmEliminar #id_detalle").val( data.id_detalle );
	});
}

//elimina registros
var eliminar = function(){
	$("#eliminar-detalle").on("click", function(){
		var id_detalle = $("#frmEliminar #id_detalle").val();
		$.ajax({
			method:"POST",
			url: "../controllers/detalle_controller/remove_data.php",
			data: {//los parametros a pasar en el metodo al script de eliminar
					"id_detalle": id_detalle
			}
		}).done( function( info ){//cuando termina la llamada asincrona se ejecuta esta seccion
			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			//location.reload(true);
		});
	});
}

var guardar = function(){
	$("#agregar-detalle").on("click", function(){

		var motivo = $("#frmAgregar #motivo").val();
        
		$.ajax({
			method: "POST",
			url: "../controllers/detalle_controller/add_data.php",
			data: {
					"motivo"   : motivo,
                    
			}

		}).done( function( info ){

			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			location.reload(true);
		});
	});
}




