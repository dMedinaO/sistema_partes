<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
    include ("../connect_data.php");

	$query = "select distinct DATE(parte.fecha) as fecha from parte order by DATE(parte.fecha) desc";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			echo '<option value="'.$data["fecha"].'">'.$data["fecha"].'</option>';
		}

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
