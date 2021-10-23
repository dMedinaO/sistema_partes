<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
    include ("../connect_data.php");

	$company = $_REQUEST['company'];
    $date_value = $_REQUEST['date_process'];
    $reparticion = $_REQUEST['reparticion'];

    $query = "select parte.id_parte from parte where parte.compania = '$company' AND parte.reparticion = '$reparticion' AND DATE(parte.fecha) = '$date_value'";
    $resultado = mysqli_query($conexion, $query);

    $response['status'] = "ERROR";

    if (!$resultado){
		$response['status'] = "ERROR";
	}else{
        while($data = mysqli_fetch_assoc($resultado)){
            $response['status'] = "OK";
            $response['parte'] = $data['id_parte'];
        }
    }

    echo json_encode($response);
    mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
