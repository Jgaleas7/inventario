<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");
    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
                $mbd=DB::connect();DB::disconnect();
        		$marca=$_POST['marca'];
        		$obs=$_POST["obs"];
        		$almacenamiento=$_POST["almacenamiento"];
        		$cant_raid=$_POST["cant_raid"];
        		$tipo=$_POST["tipo"];
        		$fecha=$_POST["fecha"];

      
       if (!trim($marca) == '') {
		  

                      $proof=$mbd->query("INSERT INTO disco_duro(observacion, cant_ray, marca, tipo, almacenamiento, fecha_compra)
                                           VALUES ('$obs', '$cant_raid', '$marca', '$tipo', '$almacenamiento', '$fecha')");
                       echo "bien";

             } else{
                      echo "Error";
                 }

        break;
       

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
          // $proof->execute();
				echo $id;
			}else{
                echo "Error";
            }
    break;
        
    endswitch;
?>