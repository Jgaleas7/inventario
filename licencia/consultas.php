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

       if (!trim($nombre) == '') {

      $proof=$mbd->query("INSERT INTO licencia( nombre, idioma, descripcion, fecha_adqui, fecha_vence, 
                                              fabricante, clave, usuario_lic, pass, cant_lic, pag_web, tipo_contrato)
        VALUES ('$nombre', '$idioma', '$descripcion', CURDATE(), '$fecha_vence', '$fabricante', '$clave', '$usuario', '$pass', '$cantidad', '$pagina', '$tipo_contrato')");
      if ($proof){
          echo "bien";
      }else{
          echo "error1";
      }


       } else{
                echo "Error";
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
    

            if (!trim($nombre) == '' || $cantidad>0) {
				
           $proof=$mbd->query("UPDATE licencia SET nombre='$nombre',
                              idioma='$idioma', descripcion='$descripcion', fecha_vence='$fecha_vence',
                              fabricante='$fabricante', clave='$clave', usuario_lic='$usuario',
                              pass='$pass', cant_lic='$cantidad', pag_web='$pagina', tipo_contrato='$tipo_contrato'  WHERE id_licencia='$id'");
            if ($proof){
                echo "bien";
            }else{
                echo "Error1";
            }
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
?>