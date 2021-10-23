$(window).on('load', function() {

	listar();
	listar_detalle();
});

$.fn.DataTable.ext.pager.numbers_length = 5;

var listar = function(){
    var date = getQuerystring('date');
    var reparticion = getQuerystring('reparticion');
    
	var t = $('#partes_summary').DataTable({
		"responsive": true,
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url": "../controllers/generador_controller/show_historial.php?date="+date+"&reparticion="+reparticion//llamada por ajax a php
		},
		"columns":[//agregar campos a la tabla segun nombre 
			{"data":"id_parte"},
			{"data":"fecha"},
            {"data":"reparticion"},
            {"data":"compania"},			
            {"data":"fuerza"},
			{"data":"forman"},
            {"data":"faltan"},
            {"defaultContent": "<button type='button' class='detalle btn btn-primary'><i class='fa fa-database'></i></button>"}
		]
	});
    show_detalle("#partes_summary tbody", t);
}

var listar_detalle = function(){
    
	var url =  "../controllers/generador_controller/show_resumen_values.php"
	var t = $('#summary_detail').DataTable({
		"dom": '<"newtoolbar">frtip',
        "buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
		"order": [[ 1, "desc" ]],
		"responsive": true,
		"dom": '<"newtoolbar">frtip',
		"destroy":true,
		"pageLength": 50,
		"ajax":{
		  "method":"POST",
		  "url": url
		},
  
		"columns":[
		  {"data":"Demostraciones"},
		  {"data":"PRIMERA"},
		  {"data":"SEGUNDA"},
		  {"data":"TERCERA"},
		  {"data":"CUARTA"},
		  {"data":"QUINTA"},
		  {"data":"SEXTA"},
		  {"data":"TOTALES"}
		]
	});

}

var show_detalle = function(tbody, table){
	$(tbody).on("click", "button.detalle", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
        location.href="../detail_parte/?parte="+data.id_parte;
	});
}

function getQuerystring(key, default_) {
	if (default_ == null)
		default_ = "";
	key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regex = new RegExp("[\\?&amp;]"+key+"=([^&amp;#]*)");
	var qs = regex.exec(window.location.href);
	if(qs == null)
		return default_;
	else
		return qs[1];
};
