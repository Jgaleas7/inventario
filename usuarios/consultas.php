<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");//incluyo este archivo que contiene la conexion y el host
 
    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax 
        switch($tarea):
        
        case 'guardar':
			$mbd=DB::connect();DB::disconnect();
        $numero=$_POST['empleado'];
        $nombre=$_POST['nombre'];
        $contrasena=$_POST["contrasena"];
        $cc=$_POST["cc"];
         if($contrasena != $cc ){
             echo "noc";
             return;
         }
           $proof="SELECT count(*) as resultado FROM `usuarios` WHERE nombre_usu='$nombre'";
         
           if($res_usuario2= $mbd->query($proof)){
			    if ($res_usuario2->fetchColumn() > 0) {
					echo "yae";
					return;   
		   }	}

            $sql="SELECT count(*) as resultado1 FROM `usuarios` WHERE id_empleado='$numero'";
 				if($res_usuario= $mbd->query($sql)){
						if ($res_usuario->fetchColumn() > 0) {
								echo "yan";
								return;   
							}			
					}

           


              $mbd->query("INSERT INTO `usuarios`( nombre_usu, pass, id_empleado)
                VALUES ('$nombre','$contrasena','$numero')");

                echo 'bien';

        break; //aqui termina la opcion insertar en preveedores
        
    endswitch;
?>