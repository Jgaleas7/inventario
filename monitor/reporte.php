<?php
/**
 * Created by PhpStorm.
 * User: X401
 * Date: 16/06/17
 * Time: 22:11
 */

include ("../config/conexion2.php");
$tarea=$_GET["ver"];
switch ($tarea){


    case 'ver':
        $mbd=DB::connect();
        $proof=$mbd->query("SELECT monitor.inventario, tipo_monitor, fecha_compra, monitor.observacion, tamano, monitor.serv_tag, nombre_marca, serie, dm.id_cpu, cpu.nombre_cpu ,(SELECT COUNT(*) FROM detalle_cpu_monitor WHERE detalle_cpu_monitor.id_cpu=dm.id_cpu) as monitores FROM monitor 
INNER JOIN marca ON monitor.marca=marca.id_marca 
INNER JOIN detalle_cpu_monitor dm ON monitor.inventario=dm.id_numinventario 
INNER JOIN cpu ON dm.id_cpu=cpu.num_inventario");
        $i=0;
        $tabla = "";
        while($row = $proof->fetch(PDO::FETCH_ASSOC))
        {

            $tabla.='{"inventario":"'.$row['inventario'].'","tipo_monitor":"'.$row['tipo_monitor'].'","fecha_compra":"'.$row['fecha_compra'].'", "observacion":"'.$row['observacion'].'",
            "tamano":"'.$row['tamano'].'", "ser_tag":"'.$row['serv_tag'].'", "nombre_marca":"'.$row['nombre_marca'].'", "serie":"'.$row['serie'].'", "id_cpu":"'.$row['id_cpu'].'", "nombre_cpu":"'.$row['nombre_cpu'].'", "monitores":"'.$row['monitores'].'"},';
            $i++;
        }
        $tabla = substr($tabla,0, strlen($tabla) - 1);

        echo '{"data":['.$tabla.']}';
        break;


}
