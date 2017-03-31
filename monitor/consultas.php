<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/inventario/config/conexion2.php");//incluyo este archivo que contiene la conexion y el host

    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax 
        switch($tarea):
       

        case 'guardar':
             $mbd=DB::connect();DB::disconnect();
        		$marca=$_POST['marca'];
        		$inventario=$_POST["inventario"];
        		$tipo=$_POST["tipo"];
        		$serie=$_POST["serie"];
        		$service=$_POST["service"];
        		$tamano=$_POST["tamano"];
        		$obs=$_POST["obs"];
        		$cpu=$_POST["cpu"];

       if (!trim($inventario) == '') {

           $proof=$mbd->query("INSERT INTO monitor ( serie, marca, serv_tag, tamano, inventario, tipo_monitor, observacion)
        VALUES ('$serie', '$marca', '$service', '$tamano', '$inventario', '$tipo', '$obs')");

            if ($proof){
                     guardarCpu($inventario, $cpu);
                     echo "bien";
            }else{
                     echo "Error1";
              }
            } else{
                   echo "Error";
            }

        break;
       

  case 'editar':
			$mbd=DB::connect();DB::disconnect();
      $marca=$_POST['marca'];
      $inventario=$_POST["inventario"];
      $tipo=$_POST["tipo"];
      $serie=$_POST["serie"];
      $service=$_POST["service"];
      $tamano=$_POST["tamano"];
      $obs=$_POST["obs"];
      $cpu=$_POST["cpu"];
      $id=$_POST["id"];


            if (!trim($inventario) == '') {
				
           $proof=$mbd->query("UPDATE monitor SET serie='$serie', marca='$marca', serv_tag='$service',
            tamano='$tamano', inventario='$inventario', tipo_monitor='$tipo', observacion='$obs' WHERE id_monitor='$id'");
           if ($proof){
               $proof1=$mbd->query(" DELETE FROM detalle_cpu_monitor   WHERE id_numinventario='$inventario'");
               guardarCpu($inventario, $cpu);
               echo "bien";
           }else{
               echo "error1";
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

function guardarCpu($num_inventariod,  $id_cpu)
{
    $mbdf = DB::connect();
    DB::disconnect();
    if (isset($id_cpu)) {

        foreach ($id_cpu as $row) {
            $proof1 = $mbdf->query("INSERT INTO detalle_cpu_monitor(id_numinventario, id_cpu) 
                                               VALUES (  '$num_inventariod', '$row')");

        }

    }
}
?>