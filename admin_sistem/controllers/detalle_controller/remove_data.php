<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connect_data.php");

	$informacion = [];

	#hacemos la consulta
	$id_detalle = $_REQUEST['id_detalle'];


	$query = "delete from detalle where id_detalle=$id_detalle";
	$response['query'] = $query;

	$resultado = mysqli_query($conexion, $query);
	verificar_resultado( $resultado, $response );
	cerrar( $conexion );

	mysqli_free_result($resultado);

	function verificar_resultado($resultado, $response){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else $informacion["respuesta"] ="BIEN";
		$response['response'] = $informacion;
		echo json_encode($response);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}


?>