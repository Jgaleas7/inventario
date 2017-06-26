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
                $d_ubicacion=$_POST["d_ubicacion"];
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
           $proof=$mbd->query( "INSERT INTO swt_rt(num_inventario, nombre, marca, port_dispo, serial, modelo, ubicacion, ip, sfp, usuario, pass, red_fisica, tipo, estado, descripcion, detalle_ubicacion)
        VALUES ('$inventario', '$nombre', '$marca', '$plibres', '$serie', '$modelo', '$ubicacion', '$ip', '$sfp', '$usuario', '$pass', '$red', '$tipo', '$estado', '$descri', '$d_ubicacion' )" );

           if($proof){ echo "|bien|"; }else{ echo "|mal|"; }

             } else{  echo "|mal|";  }

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
      $d_ubicacion=$_POST["d_ubicacion"];
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
                              descripcion='$descri', detalle_ubicacion='$d_ubicacion' WHERE id_swt_rt='$id'");
        if ($proof){  echo "|bien|"; } else{ echo "|mal|";}

			}else{  echo "|mal|";}
            break;


        
    endswitch;
?>