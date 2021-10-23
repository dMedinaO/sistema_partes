<?php

  #script que permite procesar si la cuenta de usuario existe o no, en caso de que exista

  #incluimos archivo de conexion a la base de datos...
  include("connection.php");

  #recepcion de parametros...
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  if ($username == "admin" && $password == "admin"){

    header('Status: 301 Moved Permanently', false, 301);
    header('Location: ../../admin_sistem');
  
  }else{

    $query = "select COUNT(*) as cantidad from user_system where user_system.name_user = '$username' AND password_data = '$password'";
    $resultado = mysqli_query($conexion, $query);
    
    if (!$resultado){
      header('Status: 301 Moved Permanently', false, 301);
      header('Location: ../');
    }else{

      $response=0;
      while($data = mysqli_fetch_assoc($resultado)){
        $response = $data["cantidad"];
      }

      if ($response == 0){

        header('Status: 301 Moved Permanently', false, 301);
        header('Location: ../');

      }else{

        $query = "select * from user_system where name_user  = '$username' AND password_data = '$password'";
        $resultado = mysqli_query($conexion, $query);

        $data = mysqli_fetch_assoc($resultado);

          //   #incializamos las variables de sesion...
        session_start();
        $_SESSION['username'] =$username;
        $_SESSION['company'] =$data['company'];

        if ($data['company'] == "SEXTA"){

          header('Status: 301 Moved Permanently', false, 301);
          header('Location: ../../alferez_dash');

        }else{

          header('Status: 301 Moved Permanently', false, 301);
          header('Location: ../../brigadier_dash');
        }
      }

    }
  }

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
