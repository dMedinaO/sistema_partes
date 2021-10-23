<?php

  
  $nameDocument = "/var/www/html/sistema_partes/admin_sistem/tmp_files/summary_files/results_data.csv";
  $row = 0;

  $matrixResponse = [];
  $header = ['Demostraciones', 'PRIMERA', 'SEGUNDA', 'TERCERA',	'CUARTA', 'QUINTA', 'SEXTA', 'TOTALES'];
  $dataAdd = 0;

  if (($handle = fopen($nameDocument, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $rowData= [];
      $num = count($data);
      if ($row != 0){
        for ($c=0; $c < $num; $c++) {

            $rowData[$header[$c]] = $data[$c];
        }
        $matrixResponse[$dataAdd] = $rowData;
        $dataAdd++;
      }
      $row++;
    }
    fclose($handle);
  }

  $responseData['data'] = $matrixResponse;
  echo json_encode($responseData);
?>