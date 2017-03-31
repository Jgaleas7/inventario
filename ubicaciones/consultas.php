<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");
    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();

        		$ubicacion=$_POST["ubicacion"];
        		$departamento=$_POST["departamento"];



      
       if (!trim($ubicacion) == '') {
		  

                         $proof=$mbd->query("INSERT INTO ubicacion(nombre_ubicacion) VALUES ('$ubicacion')");

                         if($proof){

                             guardarDepartamento($mbd->lastInsertId(), $departamento);

                         }
                echo $mbd->lastInsertId();
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

function guardarDepartamento($idubicacion,  $depa){
    $mbdf=DB::connect();DB::disconnect();

    foreach ($depa as $row){
        $proof1=$mbdf->query("INSERT INTO detalle_ubicaciones( id_ubicacion, id_departamento) VALUES ( '$idubicacion', '$row' )");

    }
}
?>