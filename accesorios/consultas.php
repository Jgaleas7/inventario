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
        		$cpu=$_POST["cpu"];
        		$estado=$_POST["estado"];
        		$descri=$_POST["descri"];

      
       if (!trim($inventario) == '') {
		  

      $proof=$mbd->query("INSERT INTO accesorios(num_inventario, tipo, serie, ubicacion, marca, modelo, cpu,  estado, descri)
        VALUES ('$inventario', '$tipo', '$serie', '$ubicacion', '$marca', '$modelo', '$cpu', '$estado', '$descri' )");
       if($proof){  echo "|bien|"; }else{  echo "|mal|"; }

       } else{ echo "|mal|"; }

        break;
       

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
      $id=$_POST['id'];
      $inventario=$_POST['inventario'];
      $tipo=$_POST["tipo"];
      $serie=$_POST["serie"];
      $ubicacion=$_POST["ubicacion"];
      $marca=$_POST["marca"];
      $modelo=$_POST["modelo"];
      $cpu=$_POST["cpu"];
      $estado=$_POST["estado"];
      $descri=$_POST["descri"];
    

            if (!trim($id) == ''  || !trim($inventario)=='' ) {
				
           $proof=$mbd->query("UPDATE accesorios SET 
                                num_inventario='$inventario', tipo='$tipo', serie='$serie',
                                ubicacion='$ubicacion', marca='$marca', modelo='$modelo' , cpu='$cpu', estado='$estado',
                                descri='$descri' WHERE id_accesorio='$id'");

                   if ($proof){  echo "|bien|";  }else{  echo "|mal|";}

			}else{ echo "|mal|"; }
        break;


        
    endswitch;
?>