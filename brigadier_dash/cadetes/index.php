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

    <script src="../../src/plugins/dropzone/dropzone.min.js"></script>
    <link href="../../src/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    
    <script src="../controllers/cadete_controller/controller.js"></script>

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
                                <i class="fa fa-2x fa-list"></i>
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
                        <h1 class="page-header text-overflow">Cadetes disponibles en el sistema</h1>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                  <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="panel">
                          
                          <div class="panel-body">
                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button id="demo-dt-addrow-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar Cadete</button>
                            </div>

                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                              <button id="demo-dt-addrow-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModalMasivo"><i class="fa fa-file"></i> Agregar Cadete Masivo</button>
                          </div>

                            <table id="user_systems" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th class="min-tablet"># Orden</th>
                                  <th class="min-tablet">Nombre cadete</th>
                                  <th class="min-tablet">Compañía</th>
                                  <th class="min-tablet">Sección</th>                              
                                  <th class="min-tablet">Fecha creación</th>                              
                                  <th class="min-tablet">Opciones</th>                              
                                 </tr>
                                </thead>
                              </table>

                              <div class="spinner-example col-sm-12 col-md-12 col-lg-12" id="loading" style="display:none;">
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
                                Error al cargar los datos, favor revisar el set de datos
                              </div>
                            </div>
  
                            <div class="col-sm-12 col-md-12 col-lg-12" id="okResponse" style="display:none;">
                              <div class="alert alert-success" role="alert">
                                Carga generada de manera exitosa
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

                                  <li class="active-link">

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
              <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Cadete</h4>
            </div>
            <div class="modal-body">

            <form id="frmAgregar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_orden">Número de orden <span class="required">*</span>
                </label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="numero_orden" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese número de orden">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nombre de Cadete <span class="required">*</span>
                </label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="username" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre de Cadete">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-lg-3" for="seccion">Sección <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">                
                    <select id="seccion" class="form-control" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>                  
                </div>
              </div>

              <div class="ln_solid"></div>

            </div>

            <div class="modal-footer">
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Resetear</button>
                  <button type="button" id="agregar-usuario" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div>
        <form id="frmEliminar" action="" method="POST">
          <input type="hidden" id="id_user" name="id_user" value="">
          <!-- Modal -->
          <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="modalEliminarLabel">Eliminar Cadete</h4>
                </div>
                <div class="modal-body">
                  ¿Está seguro de eliminar el cadete seleccionado?<strong data-name=""></strong>
                </div>
                <div class="modal-footer">
                  <button type="button" id="eliminar-usuario" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
        </form>
      </div>
      
      <div class="modal fade" id="myModalMasivo" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Cargar cadetes desde archivo</h4>
            </div>
            <div class="modal-body">

              <form id="frmAgregarFile" action="../controllers/cadete_controller/upload_file.php" class="dropzone" >
                     <div class="dz-default dz-message">
                         <div class="dz-icon">
                             <i class="demo-pli-upload-to-cloud icon-5x"></i>
                         </div>
                         <div>
                           <span class="dz-text">Arrastra tu archivo aquí!</span>
                           <p class="text-sm text-muted">Has click para hacerlo de manera manual</p>
                         </div>
                     </div>
                     <div class="fallback">
                         <input name="file" type="file" multiple>
                     </div>
                 </form>
                 <br>
                 <br>


            <form id="frmAgregarMasiva" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">

              <div class="ln_solid"></div>

            </div>

            <div class="modal-footer">
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Resetear</button>
                  <button type="button" id="agregar-masiva" class="btn btn-success" data-dismiss="modal">Aceptar</button>
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
