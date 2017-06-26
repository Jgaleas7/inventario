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
$combo=$_GET['combo'];
switch($tarea):


    case 'guardar':
        $mbd=DB::connect();DB::disconnect();

        $num_inventario=$_POST['num_inventario'];
        $marca=$_POST["marca"];
        $procesador=$_POST["procesador"];
        $ser_tag=$_POST["servT"];
        $garantia=$_POST["garantia"];
        $observacion=$_POST["obs"];
        $estado=$_POST["estado"];
        $modelo=$_POST["modelo"];
        $nombre_cpu=$_POST["nombre_cpu"];
        $ubicacion=$_POST["ubicacion"];
        $empleados=$_POST["empleados"];
        $licencia=$_POST["licencia"];
        $clasificacion=$_POST["clasificacion"];
        $usu_cpu=$_POST["usu_cpu"];
        $ip=$_POST["ip"];
        //campos ram
        $capacidadRam=$_POST["capacidadRam"];
        $tipoRam=$_POST["tipoRam"];
        $numModulos=$_POST["numModulos"];
        $frecuenciaRam=$_POST["frecuenciaRam"];
        //campos tvideo
        $marcatv=$_POST["marcatv"];
        $modelotv=$_POST["modelotv"];
        $capacidadtv=$_POST["capacidadtv"];
         //campos disco duro
        $hddtotal=$_POST["hddtotal"];
        $cantidadhdd=$_POST["cantidadhdd"];
        $descripcionhdd=$_POST["descripcionhdd"];


        if (!trim($num_inventario) == '') {



            $proof=$mbd->query("INSERT INTO cpu(num_inventario, marca, procesador, serv_tag,
                                id_departamento, fecha_ingreso,  id_usuario, garantia, observacion,
                                estado, modelo, nombre_cpu,nombre_usu_cpu, clasificacion, capacidadRam,
                                tipoRam, num_modulosRam, frecuenciaRam, marcaTv, modeloTv, capacidadTv,
                                hddtotal, canthdd, descrihdd
            ) VALUES
            ('$num_inventario','$marca','$procesador', '$ser_tag', '$ubicacion' , CURDATE(),'1' ,
            '$garantia' ,'$observacion','$estado','$modelo', '$nombre_cpu','$usu_cpu', '$clasificacion',
             '$capacidadRam', '$tipoRam', '$numModulos', '$frecuenciaRam', '$marcatv', '$modelotv', '$capacidadtv', '$hddtotal', '$cantidadhdd', '$descripcionhdd' 
             )");

                    if($proof){
                            guardarEmpleado($num_inventario,$empleados, $licencia, $ip);
                            echo "|bien|";
                    }else{ echo "|mal|"; }

        } else{ echo "|mal|"; }

        break; //aqui termina la opcion insertar cpu


    case'editar':
        $mbd=DB::connect();DB::disconnect();

        $id=$_POST['id'];
        $num_inventario=$_POST['num_inventario'];
        $marca=$_POST["marca"];
        $procesador=$_POST["procesador"];
        $ser_tag=$_POST["servT"];
        $garantia=$_POST["garantia"];
        $observacion=$_POST["obs"];
        $estado=$_POST["estado"];
        $modelo=$_POST["modelo"];
        $nombre_cpu=$_POST["nombre_cpu"];
        $ubicacion=$_POST["ubicacion"];
        $empleados=$_POST["empleados"];
        $licencia=$_POST["licencia"];
        $clasificacion=$_POST["clasificacion"];
        $usu_cpu=$_POST["usu_cpu"];
        $ip=$_POST["ip"];
        //campos ram
        $capacidadRam=$_POST["capacidadRam"];
        $tipoRam=$_POST["tipoRam"];
        $numModulos=$_POST["numModulos"];
        $frecuenciaRam=$_POST["frecuenciaRam"];
        //campos tvideo
        $marcatv=$_POST["marcatv"];
        $modelotv=$_POST["modelotv"];
        $capacidadtv=$_POST["capacidadtv"];
        //campos disco duro
        $hddtotal=$_POST["hddtotal"];
        $cantidadhdd=$_POST["cantidadhdd"];
        $descripcionhdd=$_POST["descripcionhdd"];

       $verifica=$mbd->query("SELECT num_inventario FROM cpu WHERE num_inventario='$num_inventario'  and id_increment!='$id'");

        if (!trim($num_inventario) == '' && $verifica->fetchColumn()==0) {


            $proof1=$mbd->query("UPDATE cpu SET num_inventario='$num_inventario', marca='$marca', procesador='$procesador',
                                 serv_tag='$ser_tag', id_departamento='$ubicacion', 
                                 garantia='$garantia', observacion='$observacion', estado='$estado',
                                 modelo='$modelo',nombre_cpu='$nombre_cpu', nombre_usu_cpu='$usu_cpu',
                                  clasificacion='$clasificacion',
                                   capacidadRam='$capacidadRam', tipoRam='$tipoRam', num_modulosRam='$numModulos',
                                   frecuenciaRam='$frecuenciaRam', marcaTv='$marcatv', modeloTv='$modelotv',
                capacidadTv='$capacidadtv', hddtotal='$hddtotal', canthdd='$cantidadhdd', descrihdd='$descripcionhdd'
                                  
                                  WHERE id_increment='$id'");
               if($proof1){

                   $proof=$mbd->query(" DELETE FROM detalle_cpu_empleados WHERE id_numinventario='$num_inventario'");
                   $proof=$mbd->query(" DELETE FROM detalle_cpu_licencia  WHERE id_numinventario='$num_inventario'");
                   $proof=$mbd->query(" DELETE FROM detalle_cpu_discod    WHERE id_numinventario='$num_inventario'");
                   $proof=$mbd->query(" DELETE FROM detalle_cpu_ip        WHERE id_numinventario='$num_inventario'");

                   guardarEmpleado($num_inventario, $empleados,  $licencia, $ip);
                   echo "|bien|";
               }else {  echo "|mal|"; }


        }else{   echo "|mal|"; }
        break;


        case'verifica':  //verificar si ya existe el numero de inventario
            $mbd=DB::connect();DB::disconnect();
            $id=$_POST["id"];
            $proof=$mbd->query(" select num_inventario from cpu where num_inventario='$id'");
            if($proof->fetchColumn()>0){
                  echo "existe";
            }else{  echo $id;   }
            break;


    endswitch;

    //SWITCH PARA ACTUALIZAR LOS COMBOS
switch($combo):
    case 'responsable':
        $consul="select * from empleados";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id"]."'>";
            echo $row["nombre"]." ".$row["apellido"];
            echo "</option>";
        }
        break;

        case 'marca':
        $consul="select * from marca";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id_marca"]."'>";
            echo $row["nombre_marca"];
            echo "</option>";
        }
        break;

        case 'ip':
        $consul="SELECT id_ip, ip FROM  ip_desocupadas";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id_ip"]."'>";
            echo $row["ip"];
            echo "</option>";
        }
        break;

        case 'disco':
        $consul="select * from disco_duro";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id_discoDuro"]."'>";
            echo $row["almacenamiento"].",  Cant:".$row["cantidad"].", Des:".$row["observacion"].", Raid:".$row["tipo"];
            echo "</option>";
        }
        break;

        case 'licencia':
        $consul="SELECT * FROM vista_licencia";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
            while ($row = $proof->fetch(PDO::FETCH_ASSOC))
            {
                if($row["cant_lic"]==$row["usadas"]){
                    echo "<option  value='".$row["id_licencia"]."' disabled=\"disabled\" >";
                    echo $row["nombre"]." -  ".$row["fabricante"]." no Dispo";
                    echo "</option>";
                }else{
                    echo "<option value='".$row["id_licencia"]."'>";
                    echo $row["nombre"]." -  ".$row["fabricante"];
                    echo "</option>";
                }
            }
        break;
endswitch;


function guardarEmpleado($num_inventariod,  $empleados, $licencia, $ip){
    $mbdf=DB::connect();DB::disconnect();
                 if(!empty($empleados)){

                     foreach ($empleados as $row){
                         $proof1=$mbdf->query("INSERT INTO detalle_cpu_empleados(id_numinventario, id_empleado) 
                                               VALUES ('$num_inventariod', '$row' )");
                     }
                 }

                                    if (!empty($licencia)){

                                        foreach ($licencia as $row){
                                            $proof1=$mbdf->query("INSERT INTO detalle_cpu_licencia(id_numinventario,  id_licencia) 
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