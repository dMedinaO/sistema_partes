$(window).on('load', function() {

	listar();
	eliminar();	
});

$.fn.DataTable.ext.pager.numbers_length = 5;

var listar = function(){
    //users -> nombre de la tabla definida en el tag HTML
	var t = $('#partes_system').DataTable({
        "order": [[ 1, "desc" ]],
		"responsive": true,
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url": "../controllers/parte_controller/show_historial.php"//llamada por ajax a php
		},
		"columns":[//agregar campos a la tabla segun nombre 
			{"data":"id_parte"},
			{"data":"fecha"},
            {"data":"compania"},
			{"data":"reparticion"},
            {"data":"fuerza"},
			{"data":"forman"},
            {"data":"faltan"},
            {"defaultContent": "<button type='button' class='detalle btn btn-primary'><i class='fa fa-database'></i></button> <button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}
		]
	});
    show_detalle("#partes_system tbody", t);
	obtener_id_eliminar("#partes_system tbody", t);

}

var obtener_id_eliminar = function(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
		var id_parte = $("#frmEliminar #id_parte").val( data.id_parte );
	});
}

var show_detalle = function(tbody, table){
	$(tbody).on("click", "button.detalle", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
        location.href="../detail_parte/?parte="+data.id_parte;
	});
}

//elimina registros
var eliminar = function(){
	$("#eliminar-parte").on("click", function(){
		var id_parte = $("#frmEliminar #id_parte").val();

		$.ajax({
			method:"POST",
			url: "../controllers/parte_controller/remove_data_parte.php",
			data: {//los parametros a pasar en el metodo al script de eliminar
					"id_parte": id_parte,
			}
		}).done( function( info ){//cuando termina la llamada asincrona se ejecuta esta seccion
			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			location.reload(true);
		});
	});
}
