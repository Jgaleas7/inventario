<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");//incluyo este archivo que contiene la conexion y el host
  //  require_once("../validaciones.php");//Incluimos archivo que contiene funciones de validacion
//error_reporting(E_ERROR);
    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax 
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        $telefono=$_POST['telefono'];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
      
      
       if (!trim($nombre) == '') {
		  

      $proof=$mbd->query("INSERT INTO empleados(nombre, apellido, telefono, id_ciudad, id_departamento)
        VALUES ( '$nombre', '$apellido',  '$telefono', '1','1')");
       
      // $proof->execute();
       } else{
                echo "Error";
            }
      
        break; //aqui termina la opcion insertar en preveedores
       

  case'editar':
			$mbd=DB::connect();DB::disconnect();
		$telefono=$_POST['telefono'];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $id=$_POST["id"];

   

            if (!trim($nombre) == '') {
				
           $proof=$mbd->query("UPDATE empleados SET 
		   nombre='$nombre',apellido='$apellido',  telefono='$telefono' WHERE id='$id'");
           //$proof->execute();
			}else{
                echo "Error hay campos obligattorios";
            }
    break;
        
    endswitch;
?>