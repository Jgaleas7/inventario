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
                     $proof=$mbd->query("INSERT INTO departamento(nombre_dep) VALUES ('$departamento')");
      if($proof){
          echo "|bien|";
      }else{echo "|mal|";}

       } else{ echo "|mal|"; }

        break;
       

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
		 $departamento=$_POST['departamento'];
        $edificio=$_POST["edificio"];
        $id=$_POST["id"];
    

            if (!trim($departamento) == '') {
				
           $proof=$mbd->query("UPDATE departamento SET nombre_dep='$departamento' WHERE id_departamento='$id'");
            if ($proof){
                echo "|bien|";
            }else{ echo "|mal|";}
			}else{
                echo "|mal|";
            } 
break;


    endswitch;

?>