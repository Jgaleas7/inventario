<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");

    $tarea=$_POST["tarea"];
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$nombre=$_POST['nombre'];
        		$inventario=$_POST["inventario"];
        		$modelo=$_POST["modelo"];
        		$serie=$_POST["serie"];
        		$tipo=$_POST["tipo"];
        		$asignado=$_POST["asignado"];
        		$version=$_POST["version"];
        		$modem=$_POST["modem"];
        		$fecha_compra=$_POST["fecha_compra"];
        		$descripcion=$_POST["descri"];
        		$sim=$_POST["sim"];


      
       if (!trim($inventario) == '') {
		  

      $proof=$mbd->query("INSERT INTO liveu( nombre_liveu, tipo, inventario, modelo, serie, fecha_compra, cant_moden, asignado, version_soft, descripcion) 
                          VALUES ('$nombre', '$tipo','$inventario', '$modelo', '$serie', '$fecha_compra', '$modem','$asignado', '$version', '$descripcion')");
      if ($proof){
                  guardarSim($inventario, $sim);

      }else{
          echo "Error1";
      }


       } else{
                echo "Error";
            }

        break;

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
      $id=$_POST['id'];
      $nombre=$_POST['nombre'];
      $inventario=$_POST["inventario"];
      $modelo=$_POST["modelo"];
      $serie=$_POST["serie"];
      $tipo=$_POST["tipo"];
      $asignado=$_POST["asignado"];
      $version=$_POST["version"];
      $modem=$_POST["modem"];
      $fecha_compra=$_POST["fecha_compra"];
      $descripcion=$_POST["descri"];
      $sim=$_POST["sim"];
    

            if (!trim($id) == ''  || !trim($inventario)=='') {
				
           $proof=$mbd->query("UPDATE liveu SET nombre_liveu='$nombre', tipo='$tipo',
                                inventario='$inventario', modelo='$modelo', serie='$serie', fecha_compra='$fecha_compra',
                                cant_moden='$modem', asignado='$asignado', version_soft='$version', descripcion='$descripcion' 
                                WHERE id_liveu='$id'");
            if ($proof){
                        $proof1=$mbd->query(" DELETE FROM detalle_sim WHERE num_inventario='$inventario'");
                        guardarSim($inventario, $sim);
                        echo "bien";
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

function guardarSim($num_inventariod,  $sim)
{
    $mbdf = DB::connect();
    DB::disconnect();
    if (isset($sim)) {

        foreach ($sim as $row) {
            $proof1 = $mbdf->query("INSERT INTO detalle_sim(id_sim, num_inventario) 
                                               VALUES ( '$row', '$num_inventariod' )");

        }

    }
}
?>