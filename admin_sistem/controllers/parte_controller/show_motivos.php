<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
    include ("../connect_data.php");

	$query = "select * from detalle;";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			echo '<option value="'.$data["id_detalle"].'">'.$data["valor_detalle"].'</option>';
		}

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
