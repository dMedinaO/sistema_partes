<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connect_data.php");

    $parte = $_REQUEST['parte'];

	$query = "select * from cadete join cadete_genera_demostracion on (cadete.numero_orden = cadete_genera_demostracion.orden_cadete) join detalle on (cadete_genera_demostracion.id_demostracion = detalle.id_detalle) where cadete_genera_demostracion.id_parte= $parte";
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