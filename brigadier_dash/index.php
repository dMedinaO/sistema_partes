<?php
	session_start();
  #echo $_SESSION['username'];
  #echo "<br>";
  #echo $_SESSION['idUser'];
  if (!$_SESSION){
	   echo '<script language = javascript>
	    alert("User No Authenticated")
	    self.location = "logout"
	    </script>';
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="0;url=partes/">
        <title>Logout</title>
        <script language="javascript">
            window.location.href = "partes/"
        </script>
    </head>
    <body>
        Go to <a href="partes/">partes/</a>
    </body>
</html>