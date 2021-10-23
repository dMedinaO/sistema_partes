<?php

    include ("../connect_data.php");

	#hacemos la obtencion de los datos
	$motivo = $_REQUEST['motivo'];	
    
    $idData = time();
	$query = "insert into detalle values ($idData, '$motivo')";
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