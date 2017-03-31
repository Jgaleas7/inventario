<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");

    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$nombre=$_POST['nombre'];
        		$numero=$_POST["numero"];
        		$imei=$_POST["imei"];
        		$conectividad=$_POST["conectividad"];
        		$compania=$_POST["compania"];



      
       if (!trim($numero) == '') {
		  

      $proof=$mbd->query("INSERT INTO simcard(imei, nombre, numero, compania, conectividad) 
        VALUES('$imei', '$nombre', '$numero', '$compania', '$conectividad')");
      if ($proof){
                echo "bien";
      }else{
                echo "Error1";
      }


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