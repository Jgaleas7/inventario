<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");

    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$numero=$_POST["numero"];
        		$imei=$_POST["imei"];
        		$conectividad=$_POST["conectividad"];
        		$compania=$_POST["compania"];

      
       if (!trim($numero) == '') {
		  

      $proof=$mbd->query("INSERT INTO simcard(imei,  numero, compania, conectividad) 
        VALUES('$imei', '$numero', '$compania', '$conectividad')");
      if ($proof){ echo "|bien|";
      }else{ echo "|mal|"; }

       } else{ echo "|mal|"; }

        break;

  case 'editar':
			$mbd=DB::connect();
      $numero=$_POST["numero"];
      $imei=$_POST["imei"];
      $conectividad=$_POST["conectividad"];
      $compania=$_POST["compania"];
        $id=$_POST["id"];
    

            if (!trim($imei) == '') {
				
           $proof=$mbd->query("UPDATE simcard SET imei='$imei',
      numero='$numero', compania='$compania', conectividad='$conectividad' WHERE id_sim='$id'");
          if ($proof){  echo "|bien|";}

          else{ echo "|mal|";}

			}else{ echo "|mal|";}
break;

case 'eliminar':
			$mbd=DB::connect();DB::disconnect();
		
        $id=$_POST["id"];
    

            if (!trim($id) == '') {
				
           $proof=$mbd->query("DELETE FROM marca WHERE id_marca='$id'");
          // $proof->execute();
				echo $id;
			}else{
                echo "Error";
            }
    break;
        
    endswitch;
?>