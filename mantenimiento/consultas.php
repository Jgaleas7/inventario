<?php
/**
 * Created by PhpStorm.
 * User: ENLMovil1
 * Date: 6/6/2017
 * Time: 2:21 PM
 */
$server  = $_SERVER['DOCUMENT_ROOT'];
include($server."/inventario/config/conexion2.php");
$combo=$_GET['combo'];
$tarea=$_POST['tarea'];

switch ($tarea){
    case 'guardar':
        $mbd=DB::connect();DB::disconnect();
        $id_equipo=$_POST['id_equipo'];
        $tipo_equipo=$_POST['tipo_equipo'];
        $obs=$_POST['obs'];
        $fecha=$_POST['fecha'];
        $precio=$_POST['precio'];
        $ubicacion=$_POST['ubicacion'];
        $estado=$_POST['estado'];
        if (!trim($id_equipo) == '' || !trim($tipo_equipo)=='0') {

            $proof=$mbd->query("INSERT INTO mantenimiento(tipo_equipo, id_equipo, 
                            fecha, precio, ubicacion, estado, observaciones) 
                            VALUES ('$tipo_equipo', '$id_equipo', '$fecha', '$precio', '$ubicacion', '$estado', '$obs')");

            if ($proof){
                echo "|bien|";
            }else{
                echo "|mal|";
            }
        } else{
            echo "|mal|";
        }


    break;

}
switch ($combo){


    case 'cpu':
        $consul="select id_increment, nombre_cpu, num_inventario from cpu";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id_increment"]."'>";
            echo $row["num_inventario"]." ".$row["nombre_cpu"];
            echo "</option>";
        }
        break;

    case 'monitor':
        $consul="select id_monitor, inventario, serie from monitor";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id_monitor"]."'>";
            echo $row["inventario"]."   ".$row["serie"];
            echo "</option>";
        }
        break;
        case 'liveu':
        $consul="select id_liveu, inventario, nombre_liveu from liveu";
        $mbd=DB::connect();DB::disconnect();
        $proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["id_liveu"]."'>";
            echo $row["inventario"]."   ".$row["nombre_liveu"];
            echo "</option>";
        }
        break;

}