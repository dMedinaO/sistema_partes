<?php
	session_start();
  #echo $_SESSION['username'];
  #echo "<br>";
  #echo $_SESSION['idUser'];
  if (!$_SESSION){
	   echo '<script language = javascript>
	    alert("User No Authenticated")
	    self.location = "../logout"
	    </script>';
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Partes</title>
    <link rel="icon" href="../../src/img/index.jpeg">
    
    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../../src/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../../src/css/nifty.min.css" rel="stylesheet">


    <!--DataTables [ OPTIONAL ]-->
    <link href="../../src/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	  <link href="../../src/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--JSTree [ OPTIONAL ]-->
    <link href="../../src/plugins/jstree/themes/default/style.min.css" rel="stylesheet">

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../../src/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../../src/plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="../../src/js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="../../src/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="../../src/js/nifty.min.js"></script>


    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="../../src/js/demo/nifty-demo.min.js"></script>

    <!--JSTree [ OPTIONAL ]-->
    <script src="../../src/plugins/jstree/jstree.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="../../src/plugins/datatables/media/js/jquery.dataTables.js"></script>
	  <script src="../../src/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
	  <script src="../../src/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../../src/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../../src/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../../src/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="../../src/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">

    <link href="../../src/plugins/spinkit/css/spinkit.min.css" rel="stylesheet">
    <link href="../../src/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
    <script src="../../src/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

    <script src="../controllers/generador_controller/data_fechas.js"></script>
    <script src="../controllers/generador_controller/process_controller.js"></script>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="../" class="navbar-brand">
                      <img src="../../src/img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Dashboard</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="fa fa-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                              <span class="ic-user pull-right">
                                  <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                  <i class="demo-pli-male"></i>
                              </span>
                              <div class="username hidden-xs">Cerrar sesi??n</div>
                          </a>


                          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                              <!-- Dropdown footer -->
                              <div class="pad-all text-right">
                                  <a href="../logout/" class="btn btn-primary">
                                      <i class="demo-pli-unlock"></i> Salir!
                                  </a>
                              </div>
                          </div>
                      </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Generador de res??menes</h1>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="panel panel-bordered">
  
                        <div class="panel-heading">
                          <h3 class="panel-title">
                            Completa el Formulario para generar tu resumen
                          </h3>
                        </div>
                        <div class="panel-body">
                          <form id="resumen_partes_data" action="" method="post" class="form-horizontal form-label-left">
  
                            <div class="form-group">
                               <label class="col-sm-3 control-label">Seleccione la repartici??n*</label>
                                <div class="col-sm-5">
                                  <select id="reparticion" class="form-control">
                                    <option>DIANA</option>
                                    <option>RANCHO MEDIO DIA</option>
                                    <option>RANCHO TARDE</option>
                                    <option>ORDEN COMPANIA</option>
                                    <option>ORDEN ESCUELA</option>
                                    <option>RETRETA ESCUELA</option>
                                    <option>RETRETA</option>
                                    <option>RETRETA EXTRAORDINARIA</option>
                                    <option>DESPACHO FRANCO</option>
                                  </select>    
                                </div>
                            </div>
  
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_process">Seleccione la fecha a buscar <span class="required">*</span>
                              </label>
  
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="selector-fechas">
                                  <select id="date_process" class="form-control">
                                    
                                  </select>
                                </div>
                              </div>
                            </div>  

                            <div class="ln_solid"></div>
  
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-3">
                                  <button type="button" id="generar_resumen" class="btn btn-primary">Generar resumen</button>
                                </div>
                            </div>
                          </form>
  
                          <div class="col-sm-12 col-md-12 col-lg-12" id="loading" style="display:none;">
                              <div class="panel">
                                  <div class="panel-body">
                                      <div class="sk-three-bounce">
                                          <div class="sk-child sk-bounce1"></div>
                                          <div class="sk-child sk-bounce2"></div>
                                          <div class="sk-child sk-bounce3"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-sm-12 col-md-12 col-lg-12" id="errorResponse" style="display:none;">
                            <div class="alert alert-danger" role="alert">
                              Error, no es posible generar el resumen para los datos seleccionados, por favor vuelva a intentarlo o comun??quese con los encargados.
                            </div>
                          </div>
  
                        </div>
                      </div>
                    </div>                    
                  </div>                  
                </div>
                <!--===================================================-->
                <!--End page content-->
      </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->






            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="../../src/img/index.jpeg" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            
                                            <p class="mnp-name">Sistema de Administraci??n</p>
                                        </a>
                                    </div>

                                </div>

                                <ul id="mainnav-menu" class="list-group">

                                  <li class="list-header">Usuarios</li>                                  

                                  <li>

                                    <a href="../cadetes/">
                                      <i class="fa fa-address-book"></i>
                                      <span class="menu-title">Cadetes</span><i class="arrow"></i>
                                    </a>
                                    
                                  </li>                                                                  

                                  <li class="list-header">Partes e Historial</li>                                  

                                  <li>
                                    <a href="../partes/">
                                        <i class="fa fa-file"></i>
                                        <span class="menu-title">Generar Parte</span><i class="arrow"></i>
                                    </a>

                                  </li>

                                  <li>
                                    <a href="../historial_partes/">
                                        <i class="fa fa-database"></i>
                                        <span class="menu-title">Historial de Parte</span><i class="arrow"></i>
                                    </a>

                                  </li>

                                  <li class="active-link">
                                    <a href="../resumen_partes/">
                                        <i class="fa fa-calendar"></i>
                                        <span class="menu-title">Generar reporte</span><i class="arrow"></i>
                                    </a>

                                  </li>

						        </ul>

                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">


            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2021 David Medina Ortiz, david.medina@cebib.cl</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

  </body>
</html>
