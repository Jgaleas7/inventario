<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");

    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$nombre=$_POST['nombre'];
        		$fabricante=$_POST["fabricante"];
        		$descripcion=$_POST["descripcion"];
        		$idioma=$_POST["idioma"];
        		$fecha_vence=$_POST["fecha_vence"];
        		$clave=$_POST["clave"];
        		$usuario=$_POST["usuario"];
        		$pass=$_POST["pass"];
        		$cantidad=$_POST["cant_lic"];
        		$pagina=$_POST["pag_web"];
        		$tipo_contrato=$_POST["tipo_contrato"];
        		$users=$_POST["users"];

       if (!trim($nombre) == '') {

      $proof=$mbd->query("INSERT INTO licencia( nombre, idioma, descripcion, fecha_adqui, fecha_vence, 
                                              fabricante, clave, usuario_lic, pass, cant_lic, pag_web, tipo_contrato)
        VALUES ('$nombre', '$idioma', '$descripcion', CURDATE(), '$fecha_vence', '$fabricante', '$clave', '$usuario', '$pass', '$cantidad', '$pagina', '$tipo_contrato')");

      //verificar si se ejecuto de forma correcta la consulta
      if ($proof){
            guardarUser($mbd->lastInsertId(),$users);
          echo "|bien|";
      }else{
          echo "|mal|";
      }


       } else{
           echo "|mal|";
            }

        break;

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
      $id=$_POST['id'];
      $nombre=$_POST['nombre'];
      $fabricante=$_POST["fabricante"];
      $descripcion=$_POST["descripcion"];
      $idioma=$_POST["idioma"];
      $fecha_vence=$_POST["fecha_vence"];
      $clave=$_POST["clave"];
      $usuario=$_POST["usuario"];
      $pass=$_POST["pass"];
      $cantidad=$_POST["cant_lic"];
      $pagina=$_POST["pag_web"];
      $tipo_contrato=$_POST["tipo_contrato"];
      $users=$_POST["users"];

      $cant_lic_usadas=$mbd->query("SELECT COUNT(*) FROM detalle_cpu_licencia dl WHERE dl.id_licencia='$id'");

            $lic_usadas=$cant_lic_usadas->fetchColumn();

            if (!trim($nombre) == '' && $cantidad>0 &&  (int)$lic_usadas <= $cantidad) {
				
           $proof=$mbd->query("UPDATE licencia SET nombre='$nombre',
                              idioma='$idioma', descripcion='$descripcion', fecha_vence='$fecha_vence',
                              fabricante='$fabricante', clave='$clave', usuario_lic='$usuario',
                              pass='$pass', cant_lic='$cantidad', pag_web='$pagina', tipo_contrato='$tipo_contrato'  WHERE id_licencia='$id'");
            if ($proof){
                $proof1=$mbd->query(" DELETE FROM detalle_users_licencia WHERE id_licencia='$id'");
                guardarUser($id, $users);

                echo "|bien|";
            }else{
                echo "|mal|";
            }
			}else{
                echo "|mal|";
            } 
    break;


        
    endswitch;


function guardarUser($id_lic,  $user){
    $mbd=DB::connect();DB::disconnect();
    if (isset($user) && !empty($user)){

                foreach ($user as $row){
                    $proof=$mbd->query("INSERT INTO detalle_users_licencia( id_licencia, id_empleado) VALUES ('$id_lic', '$row')");
                     }

    }
}
?>