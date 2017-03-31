<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");
    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$tipo_acc=$_POST['tipo_accesorio'];

    
      
       if (!trim($tipo_acc) == '') {
		  

      $proof=$mbd->query("INSERT INTO tipo_accesorio(tipo_accesorio) 
        VALUES ('$tipo_acc')");
      if($proof){
                 echo "bien";
             }else{
                        echo "Error";
                  }

                 }
       else{
                  echo "Error";
            }

        break;
       

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
      $tipo_acc=$_POST['tipo_accesorio'];

        $id=$_POST["id"];
    

            if (!trim($tipo_acc) == '') {
				
           $proof=$mbd->query("UPDATE tipo_accesorio SET tipo_accesorio='$tipo_acc' WHERE id_taccesorio='$id'");
         if ($proof){
                      echo "bien";
         }else{
                      echo "Error";
         }
			}else{
                     echo "Error";
            } 
break;

case 'eliminar':
			$mbd=DB::connect();DB::disconnect();
    $tipo_acc=$_POST['tipo_accesorio'];
        $id=$_POST["id"];
    

            if (!trim($id) == '') {
				
           $proof=$mbd->query("DELETE FROM marca WHERE id_marca='$id'");

				if ($proof){
				    echo "bien";
                }else{
				    echo "Error";
                }
			}else{
                echo "Error";
            }
    break;
        
    endswitch;
?>