$(document).ready(function () {

	$.ajax({
		type: "POST",
		url: "../controllers/generador_controller/show_fechas.php",
		success: function(response){
			$('.selector-fechas select').html(response).fadeIn();
		}
	});
});
