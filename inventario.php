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
    <title>Soportech</title>
    <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
<!--

-->
    <!-- Iconos -->
    <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->

    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  </head>
  <body class="skin-black sidebar-mini">
   <div class="wrapper">
         <header class="main-header">
        <!-- Logo -->
        <a href="inventario.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TVC</b></span>
          <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Soportech TVC</b></span></font>
            
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Barra de Navegación</span>
        </a>
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
          
          <!-- OOCULTAMOS EL BUSCADOR -->

          <!-- search form
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." autocomplete="off">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          
          <!-- /.search form 
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
          <ul class="sidebar-menu">
            <li class="header">IT Broadcast</li>


              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-suitcase"></i>
                      <span>Activos</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a onclick="inicio('cpu/cpu.php')"><i class="fa fa-laptop"></i>Computadores</a></li>
                      <li><a onclick="inicio('monitor/monitor.php')"><i class="fa fa-desktop"></i>Monitores</a></li>
                      <li><a onclick="inicio('licencia/licencia.php')"><i class="fa fa-certificate"></i>Licencias</a></li>
                      <li><a onclick="inicio('liveu/liveu.php')"><i class="fa fa-fax"></i>Live U</a></li>
                      <li><a onclick="inicio('swt_rt/swt_rt.php')"><i class="fa fa-exchange"></i>Switch/Router</a></li>
                      <li><a onclick="inicio('accesorios/accesorios.php')"><i class="fa fa-cubes"></i>Accesorios</a></li>
                  </ul>
              </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Empleados</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('empleados/empleados.php')"><i class="fa fa-user-plus"></i>Nuevo Empleado</a></li>
                 <li><a onclick="inicio('empleados/ver_empleados.php')"><i class="fa fa-eye"></i>Ver Empleados</a></li>
              
                
              </ul>
            </li>

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


              <li class="treeview">
              <a href="#">
                <i class="fa fa-certificate"></i>
                <span>Tickets</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('correo/compose.html')"> <i class="fa fa-plus-circle"></i>Nuevo Correo</a></li>
                <li><a onclick="inicio('correo/mailbox.html')"><i class="fa fa-eye"></i>Ver correos</a></li>


              </ul>
            </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-save"></i>
                <span>Disco Duro</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('discod/discod.php')"> <i class="fa fa-plus-circle"></i>Nuevo Disco Duro</a></li>
                <li><a onclick="inicio('discod/ver_discod.php')"><i class="fa fa-eye"></i>Ver Disco Duro</a></li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a onclick="inicio('usuarios/usuario.php')"><i class="fa fa-plus-circle"></i>Nuevo Usuario</a></li>
                <!--<li onclick="inicio('usuarios/ver_usuario.php')"><a href="usuarios/ver_usuario.php"><i class="fa fa-eye"></i>Usuarios Creados</a>
                </li>-->
                
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
                              <li><a onclick="inicio('edificio/edificio.php')"><i class="fa fa-eye"></i>Crear Edificio</a></li>
                              <li><a onclick="inicio('edificio/ver_edificio.php')"><i class="fa fa-eye"></i>Ver Edificio</a></li>

                          </ul>
                      </li>
                      <li class="active">

                          <a href="#"><i class="fa fa-circle-o"></i> Departamento
                              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                          </a>
                          <ul class="treeview-menu menu-open" style="display: none;">
                              <li><a onclick="inicio('departamento/departamento.php')"><i class="fa fa-eye"></i>Departamento</a></li>
                              <li><a onclick="inicio('departamento/ver_departamento.php')"><i class="fa fa-eye"></i>Ver Departamento</a></li>

                          </ul>
                      </li>
                      <li class="active">

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
              </li>
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
       <style>
           #inicio{
               height: auto;
               overflow: hidden;
           }
          </style>
        <div id="inicio">
           <center>
              <style>
                  #bienvenido{
                      vertical-align:middle;
                      font-size: 50px;
                     
                  }
               </style>
               <!--<font color="orange " label id="bienvenido">Televicentro</label> </font>-->
            <img src="images/unnamed.png" WIDTH=200 HEIGHT=130 >
           </center>
            
        </div>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Televicentro &copy;</strong> Todos los derechos reservados.
      </footer>
          
       <div class="control-sidebar-bg"></div>
       
       
   </div>
   <script> 
     
      
   function inicio($url){
	//var xurl = $(this).attr("target");
	$('#inicio').html(''+
	'<iframe width="100%" height="1000px" id="MarcoArchivo" frameborder="1" src=""></iframe>');
	document.getElementById('MarcoArchivo').src = url1($url);
	}

	function url1($ref){
	var ruta = "<?php echo $_SERVER['PHP_SELF'] ?>";
	return '/'+ruta.split('/')[1] +'/' + $ref;
	};
       
       
     
      </script>
      
         
       <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>