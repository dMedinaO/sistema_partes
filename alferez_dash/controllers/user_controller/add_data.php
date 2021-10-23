<?php

    include ("../connect_data.php");

	#hacemos la obtencion de los datos
	$name = $_REQUEST['username'];	
    $password = $_REQUEST['password'];	
    $company = $_REQUEST['company'];
	$idData = time();
	$query = "insert into user_system values ($idData, '$name', '$password', '$company', NOW(), NOW())";
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