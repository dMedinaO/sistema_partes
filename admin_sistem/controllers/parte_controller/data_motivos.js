$(document).ready(function () {

	$.ajax({
		type: "POST",
		url: "../controllers/parte_controller/show_motivos.php",
		success: function(response){
			$('.selector-motivos select').html(response).fadeIn();
		}
	});
});
