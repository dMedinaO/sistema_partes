<?php

    $date_value = $_REQUEST['date'];
    $reparticion = $_REQUEST['reparticion'];
    $reparticion = str_replace(" ", "_", $reparticion);

    $name_file = "/var/www/html/sistema_partes/admin_sistem/tmp_files/summary_files/results_data.csv";
    $command = "python3 /var/www/html/sistema_partes/admin_sistem/controllers/parte_controller/generar_planilla_resumen_parte.py $date_value $reparticion $name_file";

    exec($command);
    
?>
