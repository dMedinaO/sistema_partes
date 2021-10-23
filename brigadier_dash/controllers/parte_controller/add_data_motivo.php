<?php

    include ("../connect_data.php");

	#hacemos la obtencion de los datos
	$cadete = $_REQUEST['cadete'];
    $motivo = $_REQUEST['motivo'];
    $parte = $_REQUEST['parte'];	
    
    $idData = time();
	$query = "insert into cadete_genera_demostracion values ($parte, $cadete, $motivo)";
	$resultado = mysqli_query($conexion, $query);

	verificar_resultado( $resultado, $conexion, $parte, $motivo);
	cerrar( $conexion );

	function verificar_resultado($resultado, $conexion, $parte, $motivo){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else{
			$informacion["respuesta"] ="BIEN";

			//get actual value
			$query = "select detalle_faltas_parte.cantidad from detalle_faltas_parte where detalle_faltas_parte.id_parte = $parte AND detalle_faltas_parte.id_detalle = $motivo";
			$resultado = mysqli_query($conexion, $query);
			$data = mysqli_fetch_assoc($resultado);
			$monto = $data['cantidad'] + 1;

			//update
			$query = "update detalle_faltas_parte set cantidad = $monto where id_parte = $parte AND id_detalle = $motivo";
			$resultado = mysqli_query($conexion, $query);

		}
		echo json_encode($informacion);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>