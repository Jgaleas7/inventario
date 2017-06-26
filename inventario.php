<?php 
 // include("config/conexion.php");
//session_start();
if(!isset($_SESSION['codigo'])){
 //   echo "<script> location.href='index.php'; </script>";
}    

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Soportech TVC</title>
    <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="font-awesome-4.5.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" type="text/css" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" type="text/css" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  </head>
  <body class="skin-black sidebar-mini">
   <div class="wrapper">
         <header class="main-header">
        <!-- Logo -->
        <a href="inventario" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TVC</b></span>
          <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Soportech TVC</b></span>
            
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Barra de Navegación</span>

        </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/logo1.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">Juan Galeas</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="images/itb.png" class="img-circle" alt="User Image">

                                <p>
                                    Juan Galeas - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>


                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a href="index.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
         </nav>
       </header>
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/userjpg.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo "Juan Galeas"; //$_SESSION['nombre']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          
          <ul class="sidebar-menu">
            <li class="header">IT Broadcast</li>


              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-suitcase"></i>
                      <span>Activos</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li style="cursor:pointer"><a onclick="inicio('cpu/cpu.php')"><i  class="fa fa-laptop"></i>Computadores</a></li>
                      <li style="cursor:pointer"><a onclick="inicio('monitor/monitor.php')"><i  class="fa fa-desktop"></i>Monitores</a></li>
                      <li style="cursor:pointer"><a onclick="inicio('licencia/licencia.php')"><i  class="fa fa-certificate"></i>Licencias</a></li>
                      <li style="cursor:pointer" ><a onclick="inicio('liveu/liveu.php')"><i  class="fa fa-fax"></i>Live U</a></li>
                      <li style="cursor:pointer"><a onclick="inicio('swt_rt/swt_rt.php')"><i  class="fa fa-exchange"></i>Switch/Router</a></li>
                      <li style="cursor:pointer" ><a onclick="inicio('accesorios/accesorios.php')"><i  class="fa fa-cubes"></i>Accesorios</a></li>
                  </ul>
              </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Empleados</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li style="cursor:pointer" ><a onclick="inicio('empleados/empleados.php')"><i  class="fa fa-user-plus"></i>Nuevo Empleado</a></li>
                 <li style="cursor:pointer"><a onclick="inicio('empleados/ver_empleados.php')"><i  class="fa fa-eye"></i>Ver Empleados</a></li>
              
                
              </ul>
            </li>

              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-wrench"></i>
                      <span>Mantenimiento</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li style="cursor:pointer"><a onclick="inicio('mantenimiento/mantenimiento.php')"><i  class="fa fa-plus-circle"></i>Mantenimineto</a></li>

                  </ul>
              </li>
<!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-copy"></i>
                <span>Marcas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('marca/marcas.php')"><i class="fa fa-plus-circle"></i>CREAR Marca</a></li>
                <li><a onclick="inicio('marca/ver_marcas.php')"><i class="fa fa-eye"></i>VER Marcas</a></li>
                </ul>
            </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>RAM</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('ram/ram.php')"> <i class="fa fa-plus-circle"></i>Nueva RAM</a></li>
                <li><a onclick="inicio('ram/ver_ram.php')"><i class="fa fa-eye"></i>Ver RAM</a></li>

              </ul>
            </li>
-->
<!--
              <li class="treeview">
              <a href="#">
                <i class="fa fa-certificate"></i>
                <span>Tickets</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('correo/compose.html')"> <i class="fa fa-plus-circle"></i>Nuevo Correo</a></li>
                <li><a onclick="inicio('correo/mailbox.html')"><i class="fa fa-eye"></i>Ver correos</a></li>


              </ul>
            </li> -->

              <li class="treeview">
              <a href="#">
                <i class="fa fa fa-circle-o text-aqua"></i>
                <span>Desplegables</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li style="cursor:pointer" ><a onclick="inicio('desplegables/indexform')"> <i  class="fa fa-plus-circle"></i>Desplegables</a></li>


              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Usuarios Soportech</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li style="cursor:pointer"><a onclick="inicio('usuarios/usuario.php')"><i  class="fa fa-plus-circle"></i>Nuevo Usuario</a></li>
                <!--<li onclick="inicio('usuarios/ver_usuario.php')"><a href="usuarios/ver_usuario.php"><i class="fa fa-eye"></i>Usuarios Creados</a>
                </li>
                
                <li onclick="window.location='destruir_sesiones.php'"><a><i class="fa fa-eye"></i>Salir del sistema</a></li>
                <!--<li><a href=""><i class="fa fa-binoculars"></i>Ver Usuarios</a></li>-->
              </ul>
            </li>

              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-share"></i> <span>Ubicacion</span>
                      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">

                      <li class="active">

                          <a href="#"><i class="fa fa-circle-o"></i> Edificio
                              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                          </a>
                          <ul class="treeview-menu menu-open" style="display: none;">
                              <li style="cursor:pointer"><a onclick="inicio('edificio/edificio.php')"><i  class="fa fa-plus-circle"></i>Crear Edificio</a></li>
                              <li style="cursor:pointer"><a onclick="inicio('edificio/ver_edificio.php')"><i  class="fa fa-eye"></i>Ver Edificio</a></li>

                          </ul>
                      </li>
                      <li class="active">

                          <a href="#"><i class="fa fa-circle-o"></i> Departamento
                              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                          </a>
                          <ul class="treeview-menu menu-open" style="display: none;">
                              <li style="cursor:pointer"><a onclick="inicio('departamento/departamento.php')"><i  class="fa fa-plus-circle"></i>Departamento</a></li>
                              <li style="cursor:pointer"><a onclick="inicio('departamento/ver_departamento.php')"><i  class="fa fa-eye"></i>Ver Departamento</a></li>

                          </ul>
                      </li>
                     <!-- <li class="active">

                          <a href="#"><i class="fa fa-circle-o"></i> Ubicaciones
                              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                          </a>
                          <ul class="treeview-menu menu-open" style="display: none;">
                              <li><a onclick="inicio('ubicaciones/ubicacion.php')"><i class="fa fa-eye"></i>Ubicacion</a></li>
                              <li><a onclick="inicio('ubicaciones/ver_ubicacion.php')"><i class="fa fa-eye"></i>Ver Ubicaciones</a></li>

                          </ul>
                      </li>
                  </ul>
              </li>-->
             <!--
               <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-info-sign"></i>
                <span>Ayuda</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('ayuda.php')"><i class="fa fa-plus-circle"></i>Ver manual de usuario</a></li>
               
              </ul>
            </li> 
             
             <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-info-sign"></i>
                <span>About</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('about.php')"><i class="fa fa-plus-circle"></i>Contacto</a></li>
               
              </ul>
            </li> -->
                         
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
     
        <div class="content-wrapper" style="background-color:white;">
       <!--<style>
           #inicio{
               height: auto;
               overflow: hidden;
           }
          </style>-->
        <div id="inicio">
        </div>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Televicentro &copy;</strong> Todos los derechos reservados. Hecho por Ing Juan Galeas
      </footer>

       
       
   </div>
   <script> 
     
      
   function inicio($url){

	$('#inicio').html(''+
	'<iframe width="100%" height="1000px" id="MarcoArchivo" frameborder="1" src=""></iframe>');
	document.getElementById('MarcoArchivo').src = url1($url);
	}

	function url1($ref){
        <?php $server= $_SERVER['PHP_SELF'] ?>
	        var ruta = "<?php echo $server; ?>";
            console.log(ruta+" "+$ref);
	        return '/'+ruta.split('/')[1] +'/' + $ref;

	}

       
     
      </script>
      
         
       <script type="text/javascript" src="plugins/jQuery/jquery-3.1.1.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->


    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>