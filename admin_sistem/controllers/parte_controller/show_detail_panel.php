<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connect_data.php");

    $parte = $_REQUEST['parte'];

	$query = "select * from parte where parte.id_parte = $parte";
	$resultado = mysqli_query($conexion, $query);
    
    $response_data = [];

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$response_data['panel1'] = explode(" ", $data['fecha'])[0];
            $response_data['panel2'] = $data['compania'];
            $response_data['panel3'] = $data['reparticion'];
            $response_data['panel4'] = $data['id_parte'];

            $response_data['number1'] = $data['fuerza'];
            $response_data['number2'] = $data['forman'];
            break;
		}

        $query_2 = "select SUM(detalle_faltas_parte.cantidad) as cantidad from detalle_faltas_parte where detalle_faltas_parte.id_parte = $parte";
        $resultado = mysqli_query($conexion, $query_2);
        while($data = mysqli_fetch_assoc($resultado)){

            if ($data['cantidad'] != NULL){
                $response_data['number3'] = $data['cantidad'];
            }else{
                $response_data['number3']=0;
            }
            $diff_value = $response_data['number1'] - ($response_data['number2'] + $response_data['number3']);
            $response_data['number4'] = $diff_value;
        }

		echo json_encode($response_data);
		
	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>