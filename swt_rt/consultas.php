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
        		$ip=$_POST["ip"];
        		$red=$_POST["red"];
        		$plibres=$_POST["plibres"];
        		$nombre=$_POST["nombre"];
        		$usuario=$_POST["usuario"];
        		$pass=$_POST["pass"];
        		$sfp=$_POST["sfp"];

       if (!trim($inventario) == '') {
           $proof=$mbd->query( "INSERT INTO swt_rt(num_inventario, nombre, marca, port_dispo, serial, modelo, ubicacion, ip, sfp, usuario, pass, red_fisica, tipo, estado, descripcion, responsable)
        VALUES ('$inventario', '$nombre', '$marca', '$plibres', '$serie', '$modelo', '$ubicacion', '$ip', '$sfp', '$usuario', '$pass', '$red', '$tipo', '$estado', '$descri', '$responsable' )" );

           if($proof){ echo "bien"; }else{ echo "Error"; }

             } else{ echo "Error";   }

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
      $responsable=$_POST["responsable"];
      $estado=$_POST["estado"];
      $descri=$_POST["descri"];
      $ip=$_POST["ip"];
      $red=$_POST["red"];
      $plibres=$_POST["plibres"];
      $nombre=$_POST["nombre"];
      $usuario=$_POST["usuario"];
      $pass=$_POST["pass"];
      $sfp=$_POST["sfp"];
    

            if (!trim($inventario) == '') {
				
           $proof=$mbd->query("UPDATE swt_rt SET num_inventario='$inventario', nombre='$nombre',
                              marca='$marca', port_dispo='$plibres', serial='$serie', modelo='$modelo',
                              ubicacion='$ubicacion', ip='$ip', sfp='$sfp', usuario='$usuario', pass='$pass',
                              red_fisica='$red', tipo='$tipo', estado='$estado',
                              descripcion='$descri', responsable='$responsable' WHERE id_swt_rt='$id'");
        if ($proof){ echo "bien"; } else{echo "error1";}

			}else{ echo "Error"; }
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