$(window).on('load', function() {

    procesar_reporte();
});

var procesar_reporte = function(){
    $("#generar_resumen").on("click", function(){
        $('#loading').show();
        var reparticion = $("#resumen_partes_data #reparticion").val();
        var date_process = $("#resumen_partes_data #date_process").val();

        if (company != "TODAS"){
            //hacemos la llamada por ajax
            $.ajax({
                method: "POST",
                url: "../controllers/generador_controller/crear_reporte.php",
                data: {
                    "reparticion"   : reparticion,
                    "date_process" : date_process
                }

            }).done( function( info ){

                var json_info = JSON.parse( info );

                if (json_info.status == "OK"){
                    console.log("OK");
                    location.href = "../detalle_parte/?parte="+json_info.parte;
                }else{
                    $('#loading').hide();
                    $('#errorResponse').show();
                    setTimeout("location.href=''", 5000);
                }
            });
        }
    });
};
