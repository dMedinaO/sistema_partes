<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connect_data.php");

	$query = "select * from user_system"; //cambiar table por el nombre de la tabla o la consulta que se quiere desarrollar
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