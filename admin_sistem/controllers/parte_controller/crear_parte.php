<?php

    include ("../connect_data.php");

	#hacemos la obtencion de los datos
	$reparticion = $_REQUEST['reparticion'];	
    $company = $_REQUEST['company'];	
    $fuerza = $_REQUEST['fuerza'];
    $forman = $_REQUEST['forman'];

    $falta = $fuerza-$forman;

	$idData = time();
	$query = "insert into parte values ($idData, NOW(), '$company', '$reparticion', $fuerza, $forman, $falta, 'PENDING')";
	$resultado = mysqli_query($conexion, $query);

	verificar_resultado( $resultado, $conexion, $idData);
	cerrar( $conexion );

	function verificar_resultado($resultado, $conexion, $idData){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else{
			$informacion["respuesta"] ="BIEN";
            $informacion['parte'] = $idData;

			//agregar 0 a cada detalle de faltas en parte
			$command = "python3 /var/www/html/sistema_partes/admin_sistem/controllers/parte_controller/complete_detail_partes.py $idData";
			exec($command);
		}
		echo json_encode($informacion);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>