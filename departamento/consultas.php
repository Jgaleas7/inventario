<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");
    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$departamento=$_POST['departamento'];
        		$edificio=$_POST['edificio'];

    
      
       if (!trim($departamento) == '') {
		  

      $proof=$mbd->query("INSERT INTO departamento(nombre_dep)
        VALUES ('$departamento')");
      if($proof){
          guardarEdificio($mbd->lastInsertId(), $edificio);
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

function guardarEdificio($iddepa,  $idedificio){
    $mbdf=DB::connect();DB::disconnect();

    foreach ($idedificio as $row){
        $proof1=$mbdf->query("INSERT INTO detalle_departamento( id_departamento, id_edificio) VALUES ( '$iddepa', '$row')");

    }
}
?>