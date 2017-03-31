<?php
/**
 * Created by PhpStorm.
 * User: ENLMovil1
 * Date: 13/1/2017
 * Time: 10:07 AM
 */

    $server  = $_SERVER['DOCUMENT_ROOT'];
    include($server."/controlit/config/conexion2.php");//incluyo este archivo que contiene la conexion y el host

    $tarea=$_POST["tarea"];// le mando este parametro que viene desde el metodo ajax
        switch($tarea):


            case 'guardar':
                $mbd=DB::connect();DB::disconnect();
                $nombre=$_POST['nombre'];
                $letra=$_POST["letra"];


                if (!trim($nombre) == '') {


                    $proof=$mbd->query("INSERT INTO tipos_clientes (letra_ticket, nombre)
        VALUES ('$letra', '$nombre')");
                    echo $nombre." ".$letra;
                    // $proof->execute();
                } else{
                    echo "Error";
                }
                //header('location:nueva-transaccion.php');
                break; //aqui termina la opcion insertar en preveedores


            case 'editar':
                $mbd=DB::connect();DB::disconnect();
                $nombre=$_POST['nombre'];
                $letra=$_POST["letra"];
                $id=$_POST["id"];


                if (!trim($nombre) == '') {

                    $proof=$mbd->query("UPDATE tipos_clientes SET 
		   nombre='$nombre', letra_ticket='$letra' WHERE id='$id'");
                    // $proof->execute();
                }else{
                    echo "Error";
                }

            case 'eliminar':
                $mbd=DB::connect();DB::disconnect();

                $id=$_POST["id"];


                if (!trim($id) == '') {

                    $proof=$mbd->query("DELETE FROM tipos_clientes WHERE id='$id'");
                    // $proof->execute();
                    echo $id;
                }else{
                    echo "Error";
                }
                break;

        endswitch;
?>