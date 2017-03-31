<?php
include_once '../config/conexion2.php';
$mbd=DB::connect();DB::disconnect();
$id = $_GET['id'];
$proof=$mbd->query("SELECT * from cpu WHERE num_inventario='$id'");
foreach($proof as $row){
    $row["num_inventario"];
    $row["serv_tag"];
    $row["id_ram"];
    $row["id_tarjetaV"];
    $row["id_edificio"];
    $row["fecha_ingreso"];
    $row["id_usuario"];
    $row["garantia"];
    $row["estado"];
    $row["modelo"];
    $row["nombre_cpu"];
    $row["nombre_usu_cpu"];
    $row["marca"];
    $row["serie"];

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

    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<button class="btn btn-lg btn-info glyphicon glyphicon-print" id="print" onclick="window.print()"> Imprimir</button>
<hr>
<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
<fieldset class="col-xs-6 col-md-6 col-lg-6 col-sm-6">
    <legend>Datos CPU:</legend>
    <div class="row help-block">
    <?php
    echo "<strong>Numero de Inventario: </strong>".$id."<br>";
    echo "<strong>Nombre del Equipo:</strong>".$row["nombre_cpu"]."<br>";
    echo "<strong>Nombre del Usuario:</strong> ".$row["nombre_usu_cpu"]."<br>";
    echo "<strong>Marca:</strong> ".$row["marca"]."<br>";
    echo "<strong>Service Tag:</strong> ".$row["serv_tag"]."<br>";
    echo "<strong>Ubicación:</strong> ".$row["id_edificio"]."<br>";
    echo "<strong>Tarjeta de Video:</strong> ".$row["id_tarjetaV"]."<br>";

    ?>

    </div>

</fieldset>

<fieldset class="col-xs-6 col-md-6 col-lg-6 col-sm-6">
    <legend>Datos:</legend>
    <div class="row  help-block">
    <?php
    echo "<strong>Garantia: </strong>".$row["garantia"]."<br>";

    echo "<strong>Modelo: </strong>".$row["modelo"]."<br>";
    echo "<strong>Serie:</strong> ".$row["serie"]."<br>";
    echo "<strong>Estado:</strong> ".$row["estado"]."<br>";
    echo "<strong>Fecha De Ingreso:</strong> ".$row["fecha_ingreso"]."<br>";
    echo "<strong>Ram:</strong> ".$row["id_ram"]."<br>";

    ?>

    </div>
</fieldset>
</div>
<div class="row col-lg-12 col-md-12 col-sm-12">
<div class="col-md-6 col-sm-6 col-xs-12 ">
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


<div class="col-md-6 col-sm-6 col-xs-12">
    <h3>Monitores</h3>
    <p>Monitores del Equipo: <?php echo $id; ?></p>
    <div class="table-responsive">
        <table class="table table-sm">
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

            $proof=$mbd->query("SELECT dm.id_numinventario, ma.nombre_marca, m.serie
                FROM detalle_cpu_monitor dm INNER join monitor m ON dm.id_monitor=m.id_monitor 
                INNER JOIN marca ma on m.marca=ma.id_marca WHERE dm.id_numinventario='$id'");
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


<div class="col-md-6 col-sm-6 col-xs-12">
    <h3>Discos Duros</h3>
    <p>Discos Duros del: <?php echo $id; ?></p>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Marca</th>
                <th>Almacenamiento</th>
                <th>Cant Raid</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $mbd=DB::connect();DB::disconnect();

            $proof=$mbd->query("SELECT d.cant_ray, d.almacenamiento, m.nombre_marca from detalle_cpu_discod dd 
                                INNER JOIN disco_duro d ON dd.id_disco=d.id_discoDuro INNER JOIN marca m ON d.marca=m.id_marca 
                                WHERE dd.id_numinventario='$id'");
            while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)) {
                echo "
            <tr>
                  
                        <td>" . $row["nombre_marca"] . "</td>
                        <td>" . $row["almacenamiento"] . "</td>
                        <td>" . $row["cant_ray"] . "</td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
