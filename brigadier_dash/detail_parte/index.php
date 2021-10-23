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

    <script src="../controllers/parte_controller/controller_detalle.js"></script>
    <script src="../controllers/parte_controller/data_motivos.js"></script>
    <script src="../controllers/parte_controller/data_cadetes.js"></script>

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
                              <div class="username hidden-xs">Cerrar sesión</div>
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
                        <h1 class="page-header text-overflow">Demostraciones para parte generado</h1>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                  <div class="col-lg-7 col-md-7">
                    <div class="row">

                      <div class="panel">
                        <div class="panel-title">
                          Información sobre el Parte
                        </div>
                      
                        <div class="panel-body">
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-calendar fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main panel1"></p>
                                    <p class="text-muted mar-no">Fecha Parte</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-users fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main panel2"></p>
                                    <p class="text-muted mar-no">Compañía</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-map fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main panel3"></p>
                                    <p class="text-muted mar-no">Repartición</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-file fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main panel4"></p>
                                    <p class="text-muted mar-no">ID Parte</p>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-5 col-md-5">

                    <div class="row">

                      <div class="panel">
                        <div class="panel-title">
                          Información sobre la fuerza
                        </div>
                        <div class="panel-body">
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-anchor fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main number1"></p>
                                    <p class="text-muted mar-no">Fuerza</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-child fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main number2"></p>
                                    <p class="text-muted mar-no">Forman</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-map fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main number3"></p>
                                    <p class="text-muted mar-no">Faltan</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="panel media middle pad-all">
                                <div class="media-left">
                                    <span class="icon-wrap icon-wrap-sm icon-circle bg-primary">
                                    <i class="fa fa-file fa-2x"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold text-main number4"></p>
                                    <p class="text-muted mar-no">Diferencia</p>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="panel">
                          
                          <div class="panel-body">

                            <div class="col-sm-12 col-md-12 col-lg-12" id="error_difference" style="display:none;">
                              <div class="alert alert-danger" role="alert">
                                La suma de los que forman y los faltantes debe ser igual a la cantidad de la fuerza
                              </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-12" id="ok_difference" style="display:none;">
                              <div class="alert alert-success" role="alert">
                                La suma los que forman y los faltantes es correcta!
                              </div>
                            </div>

                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button id="demo-dt-addrow-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar Demostración</button>
                            </div>
                            <table id="detalle_partes" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th class="min-tablet"># Orden Cadete</th>
                                  <th class="min-tablet">Cadete</th>
                                  <th class="min-tablet">Demostración</th>
                                  <th class="min-tablet">Opciones</th>
                                 </tr>
                                </thead>
                              </table>

                              <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button id="demo-dt-addrow-btn" class="btn btn-danger" data-toggle="modal" data-target="#myModalFin"><i class="fa fa-stop"></i> Finalizar parte</button>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12" id="error_response" style="display:none;">
                              <div class="alert alert-danger" role="alert">
                                No se puede finalizar el parte cuando las diferencias no cuadran.
                              </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-12" id="ok_response" style="display:none;">
                              <div class="alert alert-success" role="alert">
                                Parte generado de manera correcta.
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
                                            
                                            <p class="mnp-name">Sistema de Administración</p>
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

                                  <li class="active-link">
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

                                  <li>
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

    <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Agregar Demostración</h4>
            </div>
            <div class="modal-body">

            <form id="frmAgregar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="motivo">Seleccione la demostración <span class="required">*</span>
                </label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="selector-motivos">
                    <select id="motivo" class="form-control" required>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cadete">Seleccione el cadete <span class="required">*</span>
                </label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="selector-cadetes">
                    <select id="cadete" class="form-control" required>
                    </select>
                  </div>
                </div>
              </div>

              <div class="ln_solid"></div>

            </div>

            <div class="modal-footer">
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Resetear</button>
                  <button type="button" id="agregar-motivo" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="modal fade" id="myModalFin" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Finalizar Parte</h4>
          </div>
          <div class="modal-body">

          <form id="frmTerminar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
            
              ¿Está seguro de finalizar el parte?<strong data-name=""></strong>            
            
            <div class="ln_solid"></div>

          </div>

          <div class="modal-footer">
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="button" id="terminar-parte" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="modalEliminar" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Eliminar Demostración</h4>
        </div>
        <div class="modal-body">

        <form id="frmEliminar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
          <input type="hidden" id="id_detalle" name="id_detalle" value="">
            ¿Está seguro de eliminar la demostración seleccionada?<strong data-name=""></strong>            
          
          <div class="ln_solid"></div>

        </div>

        <div class="modal-footer">
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="button" id="eliminar-motivo" class="btn btn-success" data-dismiss="modal">Aceptar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

</body>
</html>
