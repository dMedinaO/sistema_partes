$(window).on('load', function() {

	listar();	
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
            {"defaultContent": "<button type='button' class='detalle btn btn-primary'><i class='fa fa-database'></i></button>"}
		]
	});
    show_detalle("#partes_system tbody", t);
}

var show_detalle = function(tbody, table){
	$(tbody).on("click", "button.detalle", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
        location.href="../detail_parte/?parte="+data.id_parte;
	});
}

