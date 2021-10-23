<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
    include ("../connect_data.php");

	$company = $_REQUEST['company'];
	$query = "select * from cadete where company= '$company'";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			echo '<option value="'.$data["numero_orden"].'">'.$data["nombre_cadete"].'</option>';
		}

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
