$(document).ready(function() {

	$('#newParte').bootstrapValidator({
				feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
                    fuerza: {
                        validators: {
                                notEmpty: {
                                        message: 'Debe ingresar el total de la fuerza'
                                }
                        }
					},

                    forman: {
                        validators: {
                                notEmpty: {
                                        message: 'Debe ingresar el total de formados'
                                }
                        }
					},
				}
		}).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#loading').show();
			var reparticion = $("#newParte #reparticion").val();
            var fuerza = $("#newParte #fuerza").val();
            var forman = $("#newParte #forman").val();

            //hacemos la llamada por ajax
            $.ajax({
				method: "POST",
				url: "../controllers/parte_controller/crear_parte.php",
				data: {
                    "reparticion"   : reparticion,
                    "fuerza" : fuerza,
                    "forman" : forman
				}

			}).done( function( info ){

				var json_info = JSON.parse( info );

                if (json_info.respuesta == "BIEN"){
                    console.log("OK");
                    location.href = "../detail_parte/?parte="+json_info.parte;
                }else{
                    $('#loading').hide();
                    $('#errorResponse').show();
                    //setTimeout("location.href=''", 5000);
                }
			});
    });
});
