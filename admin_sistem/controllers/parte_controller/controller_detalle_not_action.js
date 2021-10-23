$(window).on('load', function() {

	listar();
	listar_demos();
	eliminar();
	guardar();
	listar_panel();
	finalizar_parte();
});

$.fn.DataTable.ext.pager.numbers_length = 5;

var listar_demos = function(){
    //users -> nombre de la tabla definida en el tag HTML
    var parte = getQuerystring('parte');
	var t = $('#detalle_demostraciones').DataTable({
		"order": [[ 1, "asc" ]],
		"responsive": true,
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url": "../controllers/parte_controller/show_data_cadetes_demostracion.php?parte="+parte //llamada por ajax a php
		},
		"columns":[//agregar campos a la tabla segun nombre 
			{"data":"numero_orden"},
			{"data":"nombre_cadete"},
			{"data":"valor_detalle"},
		]
	});

}

var listar = function(){
    //users -> nombre de la tabla definida en el tag HTML
    var parte = getQuerystring('parte');
	var t = $('#detalle_partes').DataTable({
		"order": [[ 1, "desc" ]],
		"responsive": true,
		"destroy":true,
		"ajax":{
			"method":"POST",
			"url": "../controllers/parte_controller/show_detalle.php?parte="+parte //llamada por ajax a php
		},
		"columns":[//agregar campos a la tabla segun nombre 
			{"data":"valor_detalle"},
			{"data":"cantidad"}
		]
	});
//funciones auxiliares al momento de pinchar un boton de la tabla
obtener_id_eliminar("#detalle_partes tbody", t);
}

var obtener_id_eliminar = function(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){//accion para cuando pulsan uno de los botones eliminar de la tabla
		var data = table.row( $(this).parents("tr") ).data();
		var id_detalle = $("#frmEliminar #id_detalle").val( data.id_detalle );
	});
}

//elimina registros
var eliminar = function(){
	$("#eliminar-motivo").on("click", function(){
		var id_detalle = $("#frmEliminar #id_detalle").val();
		var parte = getQuerystring('parte');

		$.ajax({
			method:"POST",
			url: "../controllers/parte_controller/remove_data.php",
			data: {//los parametros a pasar en el metodo al script de eliminar
					"id_detalle": id_detalle,
					"parte" : parte
			}
		}).done( function( info ){//cuando termina la llamada asincrona se ejecuta esta seccion
			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			location.reload(true);
		});
	});
}

var guardar = function(){
	$("#agregar-motivo").on("click", function(){

		var cantidad = $("#frmAgregar #cantidad").val();
        var motivo = $("#frmAgregar #motivo").val();
        var parte = getQuerystring('parte');
        
		$.ajax({
			method: "POST",
			url: "../controllers/parte_controller/add_data_motivo.php",
			data: {
					"cantidad"   : cantidad,
                    "motivo" : motivo,
                    "parte" : parte
			}

		}).done( function( info ){

			var json_info = JSON.parse( info );
			//mostrar_mensaje( json_info );
			location.reload(true);
		});
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

var listar_panel = function(){

	$.ajax({
		method:"POST",
		url: "../controllers/parte_controller/show_detail_panel.php",
		data:{
			"parte" : getQuerystring('parte')
		}

	}).done( function( info ){
		
		var info = JSON.parse(info);
		
		$(".panel1").html( info.panel1 );
		$(".panel2").html( info.panel2 );
		$(".panel3").html( info.panel3 );
		$(".panel4").html( info.panel4 );

		$(".number1").html( info.number1 );
		$(".number2").html( info.number2 );
		$(".number3").html( info.number3 );
		$(".number4").html( info.number4 );

		if (parseInt(info.number4) == 0){
			
			$('#error_difference').hide();
			$('#ok_difference').show();
		}else{
			$('#ok_difference').hide();
			$('#error_difference').show();
		}

	});
};

var finalizar_parte = function(){

	$("#terminar-parte").on("click", function(){
		var value = parseInt($(".number4").html());
		
		if (value != 0){
			$('#error_response').show();			
		}else{

			var parte = getQuerystring('parte');
			$.ajax({
				method:"POST",
				url: "../controllers/parte_controller/finish_parte.php",
				data:{
					"parte" : getQuerystring('parte')
				}
		
			}).done( function( info ){
				
				var info = JSON.parse(info);
				
				if (info.response == "OK"){

					$('#error_difference').hide();
					$('#ok_difference').hide();

					$('#ok_response').show();
				}else{
					$('#error_difference').hide();
					$('#ok_difference').hide();

					$('#error_response').show();

				}
				setTimeout("location.href='../partes/'", 5000);				
			});
		}
	});		
};