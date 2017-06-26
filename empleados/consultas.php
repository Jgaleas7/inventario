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
        $correo=$_POST["correo"];
        $departamento=$_POST["departamento"];

      
       if (!trim($nombre) == '') {
		  

      $proof=$mbd->query("INSERT INTO empleados(nombre, apellido, telefono, correo, id_departamento)
        VALUES ( '$nombre', '$apellido',  '$telefono', '$correo','$departamento')");

      if ($proof){
          echo "|bien|";
      }else{ echo "|mal|"; }
       } else{ echo "|mal|"; }
      
        break; //aqui termina la opcion insertar en preveedores
       

  case'editar':
			$mbd=DB::connect();DB::disconnect();
		$telefono=$_POST['telefono'];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $id=$_POST["id"];
      $departamento=$_POST["departamento"];
   

            if (!trim($nombre) == '') {
				
           $proof=$mbd->query("UPDATE empleados SET 
		   nombre='$nombre',apellido='$apellido',  telefono='$telefono', correo='$correo', id_departamento='$departamento' WHERE id='$id'");

           if ($proof){ echo "|bien|"; }
           else{ echo "|mal|";}
            }else{ echo "|mal|"; }
    break;
        
    endswitch;
?>