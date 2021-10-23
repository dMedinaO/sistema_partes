$(document).ready(function () {

	var company = getQuerystring('company');
	$.ajax({
		type: "POST",
		url: "../controllers/parte_controller/show_cadetes.php?company="+company,
		success: function(response){
			$('.selector-cadetes select').html(response).fadeIn();
		}
	});
});

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