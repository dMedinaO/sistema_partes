<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connect_data.php");

    $date = $_REQUEST['date'];
    $reparticion = $_REQUEST['reparticion'];

	$query = "select * from parte where status='FINISH' AND parte.reparticion = '$reparticion' AND DATE(parte.fecha) = '$date'";
	$resultado = mysqli_query($conexion, $query);

	$cont=0;

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = $data;
			$cont++;
		}

		if ($cont == 0){
			$arreglo = [];
			echo json_encode($arreglo);
		}else{
			echo json_encode($arreglo);
		}

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>