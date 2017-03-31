<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");
    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$inventario=$_POST['inventario'];
        		$tipo=$_POST["tipo"];
        		$serie=$_POST["serie"];
        		$ubicacion=$_POST["ubicacion"];
        		$marca=$_POST["marca"];
        		$modelo=$_POST["modelo"];
        		$responsable=$_POST["responsable"];
        		$estado=$_POST["estado"];
        		$descri=$_POST["descri"];

      
       if (!trim($inventario) == '') {
		  

      $proof=$mbd->query("INSERT INTO accesorios(num_inventario, tipo, serie, ubicacion, marca, modelo, responsable,  estado, descri)
        VALUES ('$inventario', '$tipo', '$serie', '$ubicacion', '$marca', '$modelo', '$responsable', '$estado', '$descri' )");
       if($proof){
         echo "bien";
       }else{

           echo "Error";
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