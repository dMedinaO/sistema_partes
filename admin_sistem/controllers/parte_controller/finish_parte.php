<?php

    include ("../connect_data.php");

	#hacemos la obtencion de los datos
    $parte = $_REQUEST['parte'];	
    
    #actualizamos el estado del parte a finalizado
    
    $query = "update parte set status = 'FINISH' where id_parte=$parte";
    $resultado = mysqli_query($conexion, $query);
    $response['response'] = "OK";

    echo json_encode($response);

?>