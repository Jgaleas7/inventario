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

            echo "bien".$proof->fetch(PDO::FETCH_ASSOC);

        } else{
            echo "Error";
        }

        break;


    case 'editar':
        $mbd=DB::connect();DB::disconnect();
        $marca=$_POST['marca'];
        $desc=$_POST["desc"];
        $id=$_POST["id"];


        if (!trim($marca) == '') {

            $proof=$mbd->query("UPDATE marca SET 
		   nombre_marca='$marca', descri='$desc' WHERE id_marca='$id'");
            // $proof->execute();
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

function guardarDepartamento($idciudad,  $idedificio){
    $mbdf=DB::connect();DB::disconnect();

    foreach ($idedificio as $row){
        $proof1=$mbdf->query("INSERT INTO detalle_ciudad(id_edificio, id_ciudad) 
                               VALUES ('$row', '$idciudad' )");

    }
}
?>