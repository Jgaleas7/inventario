<?php
include_once '../config/conexion2.php';
$mbd=DB::connect();DB::disconnect();
$id = $_GET['id'];
$proof=$mbd->query("SELECT * from cpu WHERE num_inventario='$id'");
foreach($proof as $row){
    $idIncre=$row["id_increment"];
    $row["num_inventario"];
    $row["serv_tag"];
    $id_depa=$row["id_departamento"];
    $row["fecha_ingreso"];
    $row["id_usuario"];
    $row["garantia"];
    $row["estado"];
    $row["modelo"];
    $row["nombre_cpu"];
    $row["nombre_usu_cpu"];
   $idMarca= $row["marca"];
    $row["procesador"];
    $row["modeloTv"];
    $row["capacidadTv"];
    $row["tipoRam"];
    $row["capacidadRam"];
    $row["num_modulosRam"];
    $row["hddtotal"];
    $row["canthdd"];
    $row["descrihdd"];

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <script src="../plugins/jQuery/jquery-3.1.1.js" type="text/javascript"></script>

    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<button class="btn btn-flat btn-lg btn-info glyphicon glyphicon-print" id="print" onclick="window.print()"> Imprimir</button>
<button class="btn btn-flat btn-lg bg-gray-active glyphicon glyphicon-arrow-left"  onclick="window.history.back()"> Regresar</button>
<hr>
<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
<fieldset class="col-xs-6 col-md-6 col-lg-6 col-sm-6">
    <legend>Datos CPU:</legend>
    <div class="row help-block">
    <?php
    echo "<strong>Numero de Inventario: </strong>".$id."<br>";
    echo "<strong>Nombre del Equipo:</strong>".$row["nombre_cpu"]."<br>";
    echo "<strong>Nombre del Usuario:</strong> ".$row["nombre_usu_cpu"]."<br>";


    $mbd=DB::connect();DB::disconnect();
    $marca=$mbd->query("SELECT nombre_marca FROM marca   WHERE id_marca='$idMarca'");
    foreach ($marca as $marc){
        echo "<strong>Marca:</strong> ".$marc["nombre_marca"]."<br>";
    }



    echo "<strong>Service Tag:</strong> ".$row["serv_tag"]."<br>";

   /* $ubicacio=$mbd->query("SELECT nombre_dep FROM departamento   WHERE id_departamento='$id_depa'");
    foreach ($ubicacio as $ubi) {
        echo "<strong>Ubicación:</strong> " . $ubi["nombre_dep"] . "<br>";
    }*/
    $ubicacio=$mbd->query("SELECT nombre_edificio FROM edificio   WHERE id_edificio='$id_depa'");
    foreach ($ubicacio as $ubi) {
        echo "<strong>Ubicación:</strong> " . $ubi["nombre_edificio"] . "<br>";
    }

    echo "<strong>Estado:</strong> ".$row["estado"]."<br>";
    echo "<strong>Garantia: </strong>".$row["garantia"]."<br>";

    echo "<b>Modelo: </b>".$row["modelo"]."<br>";

    echo "<strong>Fecha De Ingreso a Soportech:</strong> ".$row["fecha_ingreso"]."<br>";

    ?>

    </div>

</fieldset>

<fieldset class="col-xs-6 col-md-6 col-lg-6 col-sm-6 invoice-col">
    <legend>Datos:</legend>
    <div class="row  help-block">
    <?php
    echo "<strong>Tarjeta de Video:</strong> ".$row["modeloTv"]." ".$row["capacidadTv"]."<br>";

    echo "<strong>Ram:</strong> ".$row["capacidadRam"]." ".$row["tipoRam"]."<br>";
    echo "<strong>Procesador:</strong> ".$row["procesador"]."<br>";
    echo "<strong>Disco Duro:</strong> "."Hdd Tot ".$row["hddtotal"]." Cant ".$row["canthdd"]."  Descri ".$row["descrihdd"]."<br>";


    $mbd=DB::connect();DB::disconnect();
    $ipSql=$mbd->query("SELECT ip FROM detalle_cpu_ip di INNER JOIN ipv4 ON di.id_ip=ipv4.id_ip WHERE id_numinventario='$id'");
    foreach ($ipSql as $ip){
        echo "<strong>IP:</strong> ".$ip["ip"]."<br>";
          }
        echo "<br> <h1>Accesorios</h1>";
$accesorio=$mbd->query("SELECT modelo, tipo_accesorio.tipo_accesorio, num_inventario, marca.nombre_marca FROM accesorios 
                        INNER JOIN tipo_accesorio ON tipo=tipo_accesorio.id_taccesorio
                         INNER JOIN marca on accesorios.marca=marca.id_marca  WHERE cpu='$idIncre'");
    foreach ($accesorio as $acc){
        echo "<table class='table '>

    <tr>
        <td>".$acc["num_inventario"]."</td>
        <td>".$acc["nombre_marca"]."</td>
        <td>".$acc["tipo_accesorio"]."</td>
        <td>".$acc["modelo"]."</td>
  </tr>
  </table>";

          }


    ?>

    </div>
</fieldset>
</div>
<div class="row col-lg-12 col-md-12 col-sm-12">
<div class="col-md-6 col-sm-6 col-lg-12 col-xs-12 ">
    <h3>Operadores</h3>
    <p>Operador del Equipo: <?php echo $id; ?></p>
    <div class="table-responsive">
        <table class="table ">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>


            </tr>
            </thead>
            <tbody>
            <?php
            $mbd=DB::connect();DB::disconnect();

            $proof=$mbd->query("SELECT e.nombre, e.apellido FROM detalle_cpu_empleados de 
                                INNER JOIN empleados e ON de.id_empleado=e.id WHERE id_numinventario='$id'");
            while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)) {
                echo "
            <tr>
                  
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["apellido"] . "</td>
                    
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<div class="col-md-6 col-sm-6 col-lg-12 col-xs-12">
    <h3>Monitores</h3>
    <p>Monitores del Equipo: <?php echo $id; ?></p>
    <div class="table-responsive">
        <table class="table table-sm ">
            <thead>
            <tr>
                <th>Numero de Inventario</th>
                <th>Marca</th>
                <th>Serie</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $mbd=DB::connect();DB::disconnect();

            $proof=$mbd->query("SELECT dm.id_numinventario,  m.serie, marca.nombre_marca FROM detalle_cpu_monitor dm 
                                INNER JOIN monitor m ON dm.id_numinventario=m.inventario
                                  INNER JOIN marca ON m.marca=marca.id_marca WHERE `id_cpu`='$id'");
            while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)) {
                echo "
            <tr>
                  
                        <td>" . $row["id_numinventario"] . "</td>
                        <td>" . $row["nombre_marca"] . "</td>
                        <td>" . $row["serie"] . "</td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<div class="col-md-6 col-sm-6 col-xs-12 ">
    <h3>Licencias</h3>
    <p>Licencias del: <?php echo $id; ?></p>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Fabricante</th>
                <th>Nombre</th>
                <th>Fecha Vencimiento</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $mbd=DB::connect();DB::disconnect();

            $proof=$mbd->query("SELECT li.fabricante, li.nombre, li.fecha_vence FROM detalle_cpu_licencia dl INNER JOIN 
                                licencia li ON dl.id_licencia=li.id_licencia where dl.id_numinventario='$id'");
            while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)) {
                echo "
            <tr>
                  
                        <td>" . $row["fabricante"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["fecha_vence"] . "</td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
