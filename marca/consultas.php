<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");//incluyo este archivo que contiene la conexion y el host
  //  require_once("../validaciones.php");//Incluimos archivo que contiene funciones de validacion
//error_reporting(E_ERROR);
    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax 
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$marca=$_POST['marca'];

    
      
       if (!trim($marca) == '') {
		  

      $proof=$mbd->query("INSERT INTO marca (nombre_marca)
        VALUES ('$marca')");
      if($proof){
          echo 'bien';
      }else{
          echo 'Error';
      }


       } else{
                echo "Error";
            }

        break; //aqui termina la opcion insertar en preveedores
       

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
		 $marca=$_POST['marca'];
        $desc=$_POST["desc"];
        $id=$_POST["id"];
    

            if (!trim($marca) == '') {
				
           $proof=$mbd->query("UPDATE marca SET 
		   nombre_marca='$marca', descri='$desc' WHERE id_marca='$id'");
          // $proof->execute();
			}else{
                echo "Error";
            } 
break;

case 'eliminar':
			$mbd=DB::connect();DB::disconnect();
		
        $id=$_POST["id"];
    

            if (!trim($id) == '') {
				
           $proof=$mbd->query("DELETE FROM marca WHERE id_marca='$id'");

				echo $id;
			}else{
                echo "Error";
            }
    break;
        
    endswitch;
?>