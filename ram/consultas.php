<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");

    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$voltage=$_POST['voltage'];
        		$frecuencia=$_POST["frecuencia"];
        		$capacidad=$_POST["capacidad"];
        		$tipo=$_POST["tipo"];
        		$num_modulos=$_POST["num_modulos"];

      
       if (!trim($capacidad) == '') {
		  

      $proof=$mbd->query("INSERT INTO ram(voltage, capacidad, tipo_ram, num_modulos, frecuencia)
        VALUES ('$voltage', '$capacidad', '$tipo', '$num_modulos', '$frecuencia')");
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