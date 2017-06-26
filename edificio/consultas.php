<?php
$server  = $_SERVER['DOCUMENT_ROOT'];
include($server."/inventario/config/conexion2.php");
$tarea=$_POST["tarea"];
switch($tarea):


    case 'guardar':
        $mbd=DB::connect();DB::disconnect();

        $edificio=$_POST["edificio"];


        if (!trim($edificio) == '') {


            $proof=$mbd->query("INSERT INTO edificio(nombre_edificio)
                                                       VALUES ('$edificio')");
                if ($proof){ echo "|bien|";  }else{ echo "|mal|";}


        } else{ echo "|mal|"; }

        break;


    case 'editar':
        $mbd=DB::connect();DB::disconnect();

        $edificio=$_POST["edificio"];
        $id=$_POST["id"];


        if (!trim($edificio) == '') {

            $proof=$mbd->query("UPDATE edificio SET 
		   nombre_edificio='$edificio' WHERE id_edificio='$id'");

            if ($proof){ echo "|bien|";
            }else{  echo "|mal|"; }
        }else{ echo "|mal|";  }
        break;


endswitch;

?>