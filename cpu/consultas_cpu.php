<?php
/**
 * Created by PhpStorm.
 * User: ENLMovil1
 * Date: 16/1/2017
 * Time: 9:38 AM
 */
$server  = $_SERVER['DOCUMENT_ROOT'];
include($server."/inventario/config/conexion2.php");
$tarea=$_POST["tarea"];
switch($tarea):


    case 'guardar':
        $mbd=DB::connect();DB::disconnect();

        $num_inventario=$_POST['num_inventario'];
        $marca=$_POST["marca"];
        $serie=$_POST["serie"];
        $ser_tag=$_POST["servT"];
        $id_ram=$_POST["ram"];
        $id_tarjetaV=$_POST["tvideo"];
        $garantia=$_POST["garantia"];
        $observacion=$_POST["obs"];
        $estado=$_POST["estado"];
        $modelo=$_POST["modelo"];
        $nombre_cpu=$_POST["nombre_cpu"];
        $ubicacion=$_POST["ubicacion"];
        $empleados=$_POST["empleados"];
        $disco=$_POST["disco"];
        $licencia=$_POST["licencia"];
        $monitor=$_POST["monitor"];
        $clasificacion=$_POST["clasificacion"];
        $usu_cpu=$_POST["usu_cpu"];
        $ip=$_POST["ip"];


        if(!isset($empleados)){
        $empleados='';
        }
        if(!isset($disco)){
        $disco='';
        }
        if(!isset($licencia)){
        $licencia='';
        }
        if(!isset($monitor)){
        $monitor='';
        }

        if(!isset($ip)){
        $ip='';
        }
       echo  $edificio."-".$ubicacion."emp ".$empleados;


        if (!trim($num_inventario) == '') {


            $proof=$mbd->query("INSERT INTO cpu(num_inventario, marca, serie, serv_tag, id_ram, id_tarjetaV,
           id_edificio, fecha_ingreso,  id_usuario, garantia, observacion, estado, modelo, nombre_cpu, nombre_usu_cpu, clasificacion) VALUES
            ('$num_inventario','$marca','$serie', '$ser_tag', '$id_ram', '$id_tarjetaV','$ubicacion' , CURDATE(),'1' ,
            '$garantia' ,'$observacion','$estado','$modelo', '$nombre_cpu','$usu_cpu', '$clasificacion' )");

                    if($proof){

                        guardarEmpleado($num_inventario,$empleados,$disco, $licencia, $monitor, $ip);

                    }

        } else{
            echo "Error";  }

        break; //aqui termina la opcion insertar cpu


    case'editar':
        $mbd=DB::connect();DB::disconnect();


        $nuevoinventario=$_POST['nuevoinventario'];
        $num_inventario=$_POST['num_inventario'];
        $marca=$_POST["marca"];
        $serie=$_POST["serie"];
        $ser_tag=$_POST["servT"];
        $id_ram=$_POST["ram"];
        $id_tarjetaV=$_POST["tvideo"];
        $garantia=$_POST["garantia"];
        $observacion=$_POST["obs"];
        $estado=$_POST["estado"];
        $modelo=$_POST["modelo"];
        $nombre_cpu=$_POST["nombre_cpu"];
        $ubicacion=$_POST["ubicacion"];
        $empleados=$_POST["empleados"];
        $disco=$_POST["disco"];
        $licencia=$_POST["licencia"];
        $monitor=$_POST["monitor"];
        $clasificacion=$_POST["clasificacion"];
        $usu_cpu=$_POST["usu_cpu"];
        $ip=$_POST["ip"];

        $verifica=$mbd->query(" select num_inventario from cpu where num_inventario='$nuevoinventario'");

        if (!trim($num_inventario) == '' ) {

             $proof=$mbd->query(" DELETE FROM detalle_cpu_empleados WHERE id_numinventario='$num_inventario'");
             $proof=$mbd->query(" DELETE FROM detalle_cpu_licencia  WHERE id_numinventario='$num_inventario'");
             $proof=$mbd->query(" DELETE FROM detalle_cpu_monitor   WHERE id_numinventario='$num_inventario'");
             $proof=$mbd->query(" DELETE FROM detalle_cpu_discod    WHERE id_numinventario='$num_inventario'");
             //$proof=$mbd->query(" DELETE FROM detalle_cpu_ip   WHERE id_numinventario='$num_inventario'");


            $proof1=$mbd->query("UPDATE cpu SET num_inventario='$nuevoinventario', marca='$marca', serie='$serie',serv_tag='$ser_tag',
                                id_ram='$id_ram',id_tarjetaV='$id_tarjetaV', id_edificio='$ubicacion', 
                                 garantia='$garantia', observacion='$observacion', estado='$estado',
                                 modelo='$modelo',nombre_cpu='$nombre_cpu',nombre_usu_cpu='$usu_cpu', clasificacion='$clasificacion' WHERE num_inventario='$num_inventario'");
               if($proof1){
                   guardarEmpleado($nuevoinventario,$empleados,$disco, $licencia, $monitor, $ip);
               }


        }else{
                  echo "Errorconsulta";
          }
        break;


        case'verifica':  //verificar si ya existe el numero de inventario
            $mbd=DB::connect();DB::disconnect();
            $id=$_POST["id"];
            $proof=$mbd->query(" select num_inventario from cpu where num_inventario='$id'");
            if($proof->fetchColumn()>0){
                  echo "existe";
            }else{
                  echo $id;            }

            break;




    endswitch;


function guardarEmpleado($num_inventariod,  $empleados, $disco, $licencia, $monitor, $ip){
    $mbdf=DB::connect();DB::disconnect();
                 if(!empty($empleados)){

                     foreach ($empleados as $row){
                         $proof1=$mbdf->query("INSERT INTO detalle_cpu_empleados(id_numinventario, id_empleado) 
                                               VALUES ('$num_inventariod', '$row' )");

                     }

                 }
                      if (!empty($disco)){

                          foreach ($disco as $row){
                              $proof1=$mbdf->query("INSERT INTO detalle_cpu_discod(id_numinventario,  id_disco) 
                                                    VALUES ('$num_inventariod', '$row' )");

                          }
                      }

                                    if (!empty($licencia)){

                                        foreach ($licencia as $row){
                                            $proof1=$mbdf->query("INSERT INTO detalle_cpu_licencia(id_numinventario,  id_licencia) 
                                                                  VALUES ('$num_inventariod', '$row' )");

                                        }
                                    }
                            if (!empty($monitor)){
                                foreach ($monitor as $row){
                                    $proof1=$mbdf->query("INSERT INTO detalle_cpu_monitor(id_numinventario,  id_monitor) 
                                                          VALUES ('$num_inventariod', '$row' )");

                                }

                            }
                           if ( !empty($ip) ){
                               foreach ($ip as $row){
                                   $proof1=$mbdf->query("INSERT INTO detalle_cpu_ip(id_numinventario,  id_ip) 
                                                         VALUES ('$num_inventariod', '$row' )");

                               }

                           }



}


?>