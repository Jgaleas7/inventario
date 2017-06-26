<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");
    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
                $mbd=DB::connect();DB::disconnect();
        		$obs=$_POST["obs"];
        		$almacenamiento=$_POST["almacenamiento"];
        		$cantidad=$_POST["cantidad"];
        		$tipo=$_POST["tipo"];

      
       if (!trim($almacenamiento) == '') {

           $proof=$mbd->query("INSERT INTO disco_duro( observacion, cantidad, tipo, almacenamiento)
                                           VALUES ('$obs', '$cantidad',  '$tipo', '$almacenamiento')");
           if ($proof){ echo "bien";     }


             } else{     echo "Error";   }

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