<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");//incluyo este archivo que contiene la conexion y el host

    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax 
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$marca=$_POST['marca'];

       if (!trim($marca) == '') {

      $proof=$mbd->query("INSERT INTO marca (nombre_marca) VALUES ('$marca')");
      if($proof){
          echo "|bien|";
      }else{ echo "|mal|"; }
       } else{ echo "|mal|";}

        break; //aqui termina la opcion insertar marca
       

  case 'editar':
			$mbd=DB::connect();
		 $marca=$_POST['marca'];
         $id=$_POST["id"];

            if (!trim($marca) == '') {
				
           $proof=$mbd->query("UPDATE marca SET 
		   nombre_marca='$marca' WHERE id_marca='$id'");
           if ($proof){ echo "|bien|"; }else{  echo "|mal|"; }

			}else{ echo "|mal|"; }
break;


        
    endswitch;
?>