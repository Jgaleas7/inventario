<?php
/**
 * Created by PhpStorm.
 * User: ENLMovil1
 * Date: 20/6/2017
 * Time: 4:44 PM
 */

include ("../config/conexion2.php");
$tarea=$_GET["ver"];
switch ($tarea){


    case 'ver':
        $mbd=DB::connect();
        $proof=$mbd->query("SELECT liveu.*, (SELECT  GROUP_CONCAT(' ',t2.numero) AS dates
FROM detalle_sim t1
LEFT JOIN simcard t2
  ON t2.id_sim= t1.id_sim
    WHERE t1.num_inventario = liveu.inventario               
GROUP BY t1.num_inventario) as numeros FROM liveu ");
        $i=0;
        $tabla = "";
        while($row = $proof->fetch(PDO::FETCH_ASSOC))
        {

            $tabla.='{"nombre_liveu":"'.$row['nombre_liveu'].'","tipo":"'.$row['tipo'].'","inventario":"'.$row['inventario'].'", "modelo":"'.$row['modelo'].'",
           "serie":"'.$row['serie'].'", "fecha_compra":"'.$row['fecha_compra'].'", "cant_moden":"'.$row['cant_moden'].'", "asignado":"'.$row['asignado'].'",
            "version_soft":"'.$row['version_soft'].'","numeros":"'.$row['numeros'].'", "descripcion":"'.$row['descripcion'].'"},';
            $i++;
        }
        $tabla = substr($tabla,0, strlen($tabla) - 1);

        echo '{"data":['.$tabla.']}';
        break;


}
