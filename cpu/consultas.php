<?php
    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/ot/config/conexion.php");//incluyo este archivo que contiene la conexion y el host

    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax 
        switch($tarea):
        case 'info':
            $numerotarjeta = $_POST['numerotarjeta'];
            $consulta = "Select t.cuenta as resultado from tarjetas t inner join cuentas c on t.cuenta=c.cuenta where t.numero='$numerotarjeta'";
            $resultado= mysqli_query($mysqli,$consulta);
            $resultado_valido = mysqli_query($mysqli,$consulta);
            $result=mysqli_num_rows($resultado);
            if($result==0)
            {
                echo "no se encuentra";
                return;
            }
            $consulta_estado = "Select estado as valido from tarjetas where numero='$numerotarjeta'";
            $resultado_estado = mysqli_query($mysqli,$consulta_estado);
            $result_estado = mysqli_fetch_object($resultado_estado);
            if($result_estado->valido==2)
            {
                echo "origenD";//Retornamos origenD porque la cuenta está deshabilitada
                return;
            }

            $result_valido=mysqli_fetch_object($resultado_valido);
            $res = $result_valido->resultado;
            echo $res;
        break;

        case 'modificar':
                $estado=$_POST['estado'];
                $id=$_POST['id'];

                $editar="UPDATE `ordentrabajo` SET `estado`='$estado' WHERE id_ot='$id'";
                mysqli_query($mysqli, $editar); 
              echo $estado." ".$id;
        break;

        case 'guardar':
        $area=$_POST['area']; 
        $fecha=$_POST['fecha'];
        $lugar=$_POST["lugar"];
        $materiales=$_POST["materiales"];
        $descripcion_trabajo=$_POST['descripcion_trabajo'];
        $vehiculo=$_POST["vehiculo"];
        $kilometraje=$_POST["kilometraje"];
        $usuario=$_POST["usuario"];
       // $estado=$_POST["estado"];
        $empleados=$_POST["empleados"]; // arreglo con todos los empleados  1,2,3
        if (!trim($area) == '') {
        
        $conteo="select count(*) as id_ot from ordentrabajo"; // obtener la cantidad de ordenes que hay creadas en bd 
        $conteo_id=mysqli_query($mysqli, $conteo); 
        $conteo_ot=mysqli_fetch_object($conteo_id);
        
$id_ot_final=$conteo_ot->id_ot+1;

 
$insert_ot="INSERT INTO `ordentrabajo`(`id_ot`,`area`, `fecha`, `lugar`, `materiales`, `descripcion_trabajo`, `vehiculo`, `kilometraje`,`estado`, `usuario`) VALUES ('$id_ot_final','$area','$fecha','$lugar','$materiales','$descripcion_trabajo','$vehiculo','$kilometraje','pendiente', '$usuario');";  
     $query=mysqli_query($mysqli, $insert_ot);

 guardarEmpleado($id_ot_final, $empleados);
session_start();
      $_SESSION['id_ot']=$id_ot_final;
       
    
    //echo $area." ".$fecha." "." ".$lugar." ".$materiales." ".$descripcion_trabajo." ".$vehiculo."id= ".$id_ot_final;
        }else{
            echo "E";
                return;
        }
        break; //aqui termina la opcion insertar en preveedores
        
    endswitch;

  function guardarEmpleado($id_orden_trabajo, $empleadosA){ global $mysqli;
      foreach($empleadosA as $row){
                  $emp=$row;
         
                  $detalleEmpleado="INSERT INTO `detalle_empleado`(`id_orden_trabajo`, `id_empleado`) VALUES ('$id_orden_trabajo','$emp');";
                  mysqli_query($mysqli, $detalleEmpleado);
                }
      
  }

?>