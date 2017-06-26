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
        $proof=$mbd->query("SELECT sim.*, num_inventario, nombre_liveu, modelo, serie, asignado FROM simcard sim 
INNER JOIN detalle_sim ON sim.id_sim=detalle_sim.id_sim 
INNER JOIN liveu ON detalle_sim.num_inventario=liveu.inventario");
        $i=0;
        $tabla = "";
        while($row = $proof->fetch(PDO::FETCH_ASSOC))
        {

            $tabla.='{"imei":"'.$row['imei'].'","numero":"'.$row['numero'].'","compania":"'.$row['compania'].'", "conectividad":"'.$row['conectividad'].'",
            "num_inventario":"'.$row['num_inventario'].'", "nombre_liveu":"'.$row['nombre_liveu'].'", "modelo":"'.$row['modelo'].'", "serie":"'.$row['serie'].'", "asignado":"'.$row['asignado'].'"},';
            $i++;
        }
        $tabla = substr($tabla,0, strlen($tabla) - 1);

        echo '{"data":['.$tabla.']}';
        break;


}
