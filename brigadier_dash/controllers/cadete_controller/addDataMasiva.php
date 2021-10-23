<?php

session_start();

include ("../connect_data.php");

  $compania = $_SESSION['company'];

	#obtenemos el nombre del archivo
	$pathRespone = "/var/www/html/sistema_partes/admin_sistem/tmp_files/";
  #obtenemos el nombre del archivo de entrada...
  $pathData = "/var/www/html/sistema_partes/admin_sistem/tmp_files/docName.txt";
  $nameDocument = readDocument($pathData);
	$nameDocument = $pathRespone.$nameDocument;

	#ejecutamos el comando python
	$command = "python3 process_data_from_excel_file.py $nameDocument $compania";
	$output = [];
	exec($command, $output);

	$response['command'] = $command;
	$response['process'] = $output[0];
	echo json_encode($response);

	#funcion que permite la lectura de archivos...
  function readDocument($nameFile){
    $nameDocument = "";
    //leemos un archivo de texto para capturar el nombre de la imagen...
    $file = fopen($nameFile, "r");
    while(!feof($file)) {
      $nameDocument =  fgets($file);
    }
    fclose($file);
    return $nameDocument;
  }

?>