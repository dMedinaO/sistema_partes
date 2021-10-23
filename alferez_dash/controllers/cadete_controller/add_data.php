<?php

    include ("../connect_data.php");

	#hacemos la obtencion de los datos
	$name = $_REQUEST['username'];	
    $numero_orden = $_REQUEST['numero_orden'];	
    $company = $_REQUEST['company'];
	$seccion = $_REQUEST['seccion'];
	
	$idData = time();

	$query = "insert into cadete values ('$numero_orden', '$name', '$company', $seccion, NOW(), NOW())";
	$resultado = mysqli_query($conexion, $query);

	verificar_resultado( $resultado, $conexion);
	cerrar( $conexion );

	function verificar_resultado($resultado, $conexion){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else{
			$informacion["respuesta"] ="BIEN";
		}
		echo json_encode($informacion);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>