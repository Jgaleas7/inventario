<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");

    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$ip=$_POST['ip'];
                $proof=$mbd->query("SELECT ip FROM `ipv4` WHERE ip='$ip'");
      
       if (!trim($ip) == '' && $proof->fetchColumn()==0 ) {
                      $proof=$mbd->query("INSERT INTO ipv4 ( ip)
                        VALUES ('$ip')");
                       echo "bien";

       } else{
                echo "error";
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

            case'verifica':  //verificar si ya existe el numero de ip
                $mbd=DB::connect();DB::disconnect();
                $id=$_POST["id"];
                $proof=$mbd->query("SELECT ip FROM `ipv4` WHERE ip='$id'");
                if($proof->fetchColumn()>0){
                    echo "existe";
                }else{
                    echo "noexiste";    }

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