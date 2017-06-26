<?php
include('../config/conexion2.php');
$id=$_GET['id'];

$mbd=DB::connect();DB::disconnect();
$proof=$mbd->query("SELECT * from cpu WHERE id_increment='$id'");
foreach($proof as $row){
    $inventario=$row["num_inventario"];
    $row["serv_tag"];
    $row["id_departamento"];
    $row["fecha_ingreso"];
    $row["id_usuario"];
    $row["garantia"];
    $row["estado"];
    $row["modelo"];
    $row["nombre_cpu"];
    $row["nombre_usu_cpu"];
    $row["marca"];
    $row["procesador"];
    $row["observacion"];
    $row["clasificacion"];
    //campos de Ram
    $row["capacidadRam"];
    $row["tipoRam"];
    $row["num_modulosRam"];
    $row["frecuenciaRam"];
    //campos tvideo
    $row["marcaTv"];
    $row["modeloTv"];
    $row["capacidadTv"];
    //campos disco
    $row["hddtotal"];
    $row["canthdd"];
    $row["descrihdd"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR CPU</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker-master/daterangepicker.css" />
    <link rel="stylesheet" href="../css/custombox.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
</head>
<body class="login-page">
<section class="content-header">
    <h1>
        CPU
        <small>Editar CPU</small>
    </h1>
    <ol class="breadcrumb">
        <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >CPU</a></li>
        <li class="active">Editar CPU</li>
    </ol>
</section>
<!-- Button trigger modal -->
<!-- Modal para  buscar ram-->
<div class="modal fade" id="modalram"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            RAM
            </div>
            <div id="demo" class="modal-body">
               <!-- <iframe src="../ram/buscar_ram.php" height="460" width="450" id="iframeram" allowfullscreen frameborder="0" ></iframe> -->
                <label for="capacidadRam">Capacidad Ram</label>
                <input type="text" id="capacidadRam" autocomplete="on"  value="<?php if (isset($row["capacidadRam"])) echo $row["capacidadRam"];?>"  class="input-sm form-control" placeholder="capacidad"><br>

                <label for="tipoRam">Tipo de RAM</label>
                <select id="tipoRam" class="input-sm form-control" style="width:100%">
                    <option <?php if (isset($row["tipoRam"]) && $row["tipoRam"]=="sdram") echo "selected";?> value="sdram">SDRAM</option>
                    <option <?php if (isset($row["tipoRam"]) && $row["tipoRam"]=="ddr") echo "selected";?> value="ddr">DDR</option>
                    <option <?php if (isset($row["tipoRam"]) && $row["tipoRam"]=="drr1") echo "selected";?>  value="drr1">DDR1</option>
                    <option <?php if (isset($row["tipoRam"]) && $row["tipoRam"]=="drr2") echo "selected";?> value="drr2">DDR2</option>
                    <option <?php if (isset($row["tipoRam"]) && $row["tipoRam"]=="drr3") echo "selected";?> value="drr3">DDR3</option>
                    <option <?php if (isset($row["tipoRam"]) && $row["tipoRam"]=="drr4") echo "selected";?>value="drr4">DDR4</option>
                </select>

                <label for="numModulos">Num. Modulos</label>
                <input type="number" id="numModulos" autocomplete="on"  value="<?php if (isset($row["num_modulosRam"])) echo $row["num_modulosRam"];?>" class="input-sm form-control" placeholder="num Modulos">

                <label for="frecuenciaram">Frecuencia</label>
                <select  id="frecuenciaram" class="input-sm form-control" style="width:100%">
                    <option <?php if (isset($row["frecuenciaRam"]) && $row["frecuenciaRam"]=="1") echo "selected";?> value="1">533 MHz.</option>
                    <option <?php if (isset($row["frecuenciaRam"]) && $row["frecuenciaRam"]=="2") echo "selected";?> value="2">667 MHz.</option>
                    <option <?php if (isset($row["frecuenciaRam"]) && $row["frecuenciaRam"]=="3") echo "selected";?> value="3">883 MHz.</option>
                    <option <?php if (isset($row["frecuenciaRam"]) && $row["frecuenciaRam"]=="4") echo "selected";?> value="4">1,333 MHz.</option>
                    <option <?php if (isset($row["frecuenciaRam"]) && $row["frecuenciaRam"]=="5") echo "selected";?> value="5">1600 MHz.</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addram" data-dismiss="modal" class="btn btn-success btn-flat">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para  buscar tvideo-->
<div class="modal fade" id="modaltvideo"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                T Video
            </div>
            <div id="demo" class="modal-body">
               <!-- <iframe src="../tvideo/buscar_tvideo.php" height="460" width="450" id="iframetvideo" allowfullscreen frameborder="0" ></iframe> -->
                <label for="marcatv">Marca</label>
                <select id="marcatv" class="form-control input-sm" style="width: 100%">
                    <?php
                    $mbd=DB::connect();DB::disconnect();
                    $proof1=$mbd->query("SELECT id_marca, nombre_marca FROM marca");
                    while($row1 = $row1 = $proof1->fetch(PDO::FETCH_ASSOC)){
                        if($row1["id_marca"] == $row["marcaTv"])
                        {   echo "<option selected value=".$row["marcaTv"].">".$row1["nombre_marca"]."</option>"; }
                        else
                        {   echo "<option value=".$row1["id_marca"].">".$row1["nombre_marca"]."</option>"; }
                    }

                    ?>
                </select>
                <label for="modelotv">Modelo</label>
                <input type="text" id="modelotv" autocomplete="on"  value="<?php if (isset($row["modeloTv"])) echo $row["modeloTv"];?>" class="form-control input-sm" placeholder="modelo ej quadro ...">

                <label for="capacidadtv">Capacidad</label>
                <select id="capacidadtv" class="form-control input-sm" style="width: 100%">
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="1") echo "selected";?> value="1">Incorpoada</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="2") echo "selected";?> value="2">256 MB</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="3") echo "selected";?> value="3">512 MB</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="4") echo "selected";?> value="4">128 MB</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="5") echo "selected";?> value="5">1 GB</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="6") echo "selected";?> value="6">2 GB</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="7") echo "selected";?> value="7">3 GB</option>
                    <option <?php if (isset($row["capacidadTv"]) && $row["capacidadTv"]=="8") echo "selected";?> value="8">4 GB</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addtvideo" data-dismiss="modal" class="btn btn-flat btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para  DISCO DURO-->
<div class="modal fade" id="modalDisco"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Disco Duro
            </div>
            <div id="demo" class="modal-body">
                <!--<iframe src="../tvideo/buscar_tvideo.php" height="460" width="450" id="iframetvideo" allowfullscreen frameborder="0" ></iframe>-->
                <label for="hddtotal">HDD Total</label>
                <input type="text" id="hddtotal" autocomplete="on"  value="<?php if (isset($row["hddtotal"])) echo $row["hddtotal"];?>" class="form-control input-sm" placeholder="HDD total">
                <label for="cantidadhdd">Cantidad HDD</label>
                <input type="number" id="cantidadhdd" autocomplete="on"  value="<?php if (isset($row["canthdd"])) echo $row["canthdd"];?>" class="form-control input-sm" placeholder="Cantidad HDD...">
                <label for="descripcionhdd">Descripcion HDD</label>
                <input type="text" id="descripcionhdd"  value="<?php if (isset($row["descrihdd"])) echo $row["descrihdd"];?>" class="form-control input-sm" placeholder="Descripcion HDD">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addDisco" data-dismiss="modal" class="btn btn-flat btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div id="cuerpo" class="col-md-12" >

    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="btn-group pull-right">
                <a id="guardar" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-flat  fa fa-save ">   Guardar</a>
                <a onclick="goBack()" class="btn bg-navy btn-flat fa fa-list">Buscar CPU</a>
            </div>
            <h4 class="box-title">Editar Equipo</h4>
        </div>

        <!-- form start -->
        <form>
            <div class="box-body">
                <input type="hidden" id="id" value="<?php if (isset($id)) echo $id;?>">
                <div class="row col-md-12 col-lg-12">
                    <div id="div_inventario" class=" col-md-4 col-sm-4 col-xs-10 form-group ">
                        <label class="control-label" for="inventario">Numero de Inventario</label>
                        <input type="text" class="form-control input-sm help-block has-error"  value="<?php if (isset($row["num_inventario"])) echo $row["num_inventario"];?>"   id="inventario"  name="inventario" placeholder="num Inventario">
                        <span id="error"  class="help-block hidden">Error con el valor ingresado</span>
                    </div>


                    <div class="form-group col-md-4  col-sm-4 col-xs-10">
                        <label for="servT">Service TAG</label>
                        <input type="text" class="form-control input-sm help-block" value="<?php if (isset($row["serv_tag"])) echo $row["serv_tag"];?>" id="servT" name="servT" required placeholder="Service Tag">
                    </div>


                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label  for="marca">Marca       s.</label>
                        <select class=" help-block" id="marca" name="marca" required style="width: 90%"  >
                            <?php
                            $mbd=DB::connect();DB::disconnect();
                            $proof1=$mbd->query("SELECT id_marca, nombre_marca FROM marca");
                            while($row1 = $row1 = $proof1->fetch(PDO::FETCH_ASSOC)){
                                if($row1["id_marca"] == $row["marca"])
                                {   echo "<option selected value=".$row["marca"].">".$row1["nombre_marca"]."</option>"; }
                                else
                                {   echo "<option value=".$row1["id_marca"].">".$row1["nombre_marca"]."</option>"; }
                            }
                            ?>
                        </select><a id="mmarca" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>
                    </div>

                </div>

                <div class="row col-md-12 col-lg-12">
                    <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                        <label for="modelo"> Modelo</label>
                        <input type="text" class="form-control input-sm help-block" value="<?php if (isset($row["modelo"])) echo $row["modelo"];?>" id="modelo" name="modelo" required placeholder="Modelo">

                    </div>

                    <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                        <label for="puntos"> Nombre del Usuario del Equipo</label>
                        <input type="text" class="form-control input-sm help-block" value="<?php if (isset($row["nombre_usu_cpu"])) echo $row["nombre_usu_cpu"];?>" id="usu_cpu" name="usu_cpu" required placeholder="Nombre de usuario">

                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                        <label for="clasificacion">Clasificación de Equipo</label>

                        <select  class="form-control input-sm help-block select" id="clasificacion">

                            <option<?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="1") echo "selected";?> value="1">Render</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="2") echo "selected";?> value="2">Audio</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="3") echo "selected";?> value="3">Desktop</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="4") echo "selected";?> value="4">Editora Movil</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="5") echo "selected";?> value="5">ENL</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="6") echo "selected";?> value="6">Generador de Caracteres</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="7") echo "selected";?> value="7">Loop</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="8") echo "selected";?> value="8">Prompter</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="9") echo "selected";?> value="9">Servidor</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="10") echo "selected";?> value="10">Visualizadoras</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="11") echo "selected";?> value="11">Workstation Animación</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="12") echo "selected";?> value="12">Portatil</option>
                            <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="13") echo "selected";?> value="13">Servidor Play-Out</option>

                        </select>
                    </div>

                </div>

                <div class="row col-md-12 col-lg-12">

                    <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                        <label for="puntos"> Nombre de Equipo</label>
                        <input type="text" class="form-control input-sm  help-block" value="<?php if (isset($row["nombre_cpu"])) echo $row["nombre_cpu"];?>" id="nombre_cpu" name="nombre_cpu" required placeholder="Nombre de equipo">
                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                        <label for="puntos">Garantia</label>
                        <input type="text" class="form-control input-sm  help-block" value="<?php if (isset($row["garantia"])) echo $row["garantia"];?>" id="garantia" name="garantia" required placeholder="GARANTIA">

                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                        <label for="ubicacion">Edificio</label>
                        <select  class="form-control input-sm  help-block" id="ubicacion" name="ubicacion" style="width: 100%" >

                            <?php
                            //este tiene nombre de departamento pero es el edificio
                            $mbd=DB::connect();DB::disconnect();
                            $proof1=$mbd->query("SELECT id_edificio, nombre_edificio FROM edificio");
                            while($row1 = $row1 = $proof1->fetch(PDO::FETCH_ASSOC)){
                                if($row1["id_edificio"] == $row["id_departamento"])
                                { echo "<option selected value=".$row["id_departamento"].">".$row1["nombre_edificio"]."</option>"; }
                                else
                                { echo "<option value=".$row1["id_edificio"].">".$row1["nombre_edificio"]."</option>"; }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="row col-md-12 col-lg-12">

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="ram">RAM</label>
                        <div class="input-group margin ">
                            <input type="text" id="ram" value="<?php  if(isset($row["capacidadRam"])) echo $row["capacidadRam"]; if (isset($row["num_modulosRam"])) echo " modulos".$row["num_modulosRam"];?>" disabled class="form-control input-sm">
                            <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#modalram" class="btn btn-info input-sm btn-flat "><i class="fa fa-plus"></i></button>
                     <!-- <button type="button" id="eliminarRam"  class="btn btn-danger input-sm btn-flat "><i class="fa fa-trash"></i></button> -->
                    </span>
                        </div>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="tvideo">T Video</label>
                        <div class="input-group margin ">
                            <input type="text" id="tvideo" value="<?php if(isset($row["modeloTv"])) echo $row["modeloTv"];?>" disabled class="form-control input-sm">
                            <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#modaltvideo" class="btn btn-info input-sm btn-flat"><i class="fa fa-plus"></i></button>
                     <!-- <button type="button" id="eliminarTv" class="btn btn-danger input-sm btn-flat"><i class="fa fa-trash"></i></button> -->

                               </span>
                        </div>
                    </div>

                </div>

                <div class="row col-md-12 col-lg-12">

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="estado">Estado</label>

                        <select class="form-control input-sm  help-block" id="estado">
                            <option <?php if (isset($row["estado"]) && $row["estado"]=="Operando") echo "selected";?> >Operando</option>
                            <option <?php if (isset($row["estado"]) && $row["estado"]=="Desechado") echo "selected";?>>Desechado</option>
                            <option <?php if (isset($row["estado"]) && $row["estado"]=="Bodega") echo "selected";?>>Bodega</option>
                            <option <?php if (isset($row["estado"]) && $row["estado"]=="Prestamo") echo "selected";?>>Prestamo</option>
                        </select>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-10">
                        <label for="serie">Procesador</label>
                        <input type="text" class="form-control  input-sm help-block" value="<?php if (isset($row["procesador"])) echo $row["procesador"];?>"  id="procesador" name="procesador"  placeholder="Procesador">

                    </div>

                </div>

                <div class="row col-md-12 col-lg-12 ">

                    <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                        <label style="width: inherit" for="empleados">Responsables</label>
                        <select class=" select2  help-block"  id="empleados" name="empleados" required style="width:90%"   multiple="multiple">
                            <?php
                            $mbd=DB::connect();DB::disconnect();
                            $proof5=$mbd->query("SELECT id_det_empleado, id_numinventario, id_empleado, e.nombre, e.apellido 
                                                 FROM detalle_cpu_empleados 
                                                 INNER JOIN empleados e ON id_empleado=e.id WHERE id_numinventario='$inventario'");

                            while($row5 = $row5 = $proof5->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option selected value=" . $row5["id_empleado"] . ">" . $row5["nombre"] . " " . $row5["apellido"] . "</option>";
                            }
                            responsable("SELECT  e.nombre, e.apellido, e.id FROM empleados e
                                           WHERE   e.id NOT IN  (  SELECT id_empleado 
                                           FROM detalle_cpu_empleados  WHERE id_numinventario ='$inventario' )","id","nombre","apellido");

                            ?>
                        </select><a id="mresponsable" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label style="width: inherit" for="licencia">Licencias.</label>
                        <select  class="   help-block" id="licencia"  style="width: 90%"  multiple="multiple">
                            <?php
                            $mbd=DB::connect();DB::disconnect();
                            $proof8=$mbd->query("SELECT dl.id_licencia, l.fabricante, l.nombre FROM detalle_cpu_licencia dl 
                                                      INNER join licencia l on dl.id_licencia=l.id_licencia WHERE dl.id_numinventario='$inventario'");
                            while($row8 = $row8 = $proof8->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option selected value=" . $row8["id_licencia"] . ">" . $row8["fabricante"] . " " . $row8["nombre"] . "</option>";
                            }
                            licencia("select id_licencia, fabricante, nombre, usadas, cant_lic from vista_licencia
                                         where id_licencia NOT IN (SELECT id_licencia from detalle_cpu_licencia 
                                         WHERE id_numinventario= '$inventario')","id_licencia","nombre","fabricante", "cant_lic","usadas");
                            ?>
                        </select><a id="mlicencia" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>
                    </div>

                </div>


                <div class="row col-md-12 col-lg-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label style="width: inherit" for="dduro">Disco Duro</label>
                        <div class="input-group margin ">

                            <input type="text" id="dduro" value="<?php if (isset($row["hddtotal"])) echo $row["hddtotal"]; if (isset($row["canthdd"])) echo " ".$row["canthdd"];?>" disabled class="form-control input-sm">
                            <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#modalDisco" class="btn btn-info input-sm btn-flat "><i class="fa fa-plus"></i></button>
                  </span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-lg-6 col-xs-12">
                        <label for="ip" style="width: inherit" class="control-label">IP del Equipo</label>
                        <select  class="form-control input-sm help-block" id="ip" name="ip" style="width: 90%"  multiple="multiple">
                            <?php
                            $mbd=DB::connect();DB::disconnect();
                            $proof9=$mbd->query("SELECT di.id_ip, i.ip  from detalle_cpu_ip di 
                                                 INNER JOIN ipv4 i ON i.id_ip=di.id_ip where id_numinventario='$inventario'");
                            while($row9 = $row9 = $proof9->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option selected value=" . $row9["id_ip"] . ">".$row9["ip"]."</option>";
                            }
                            cargaComboBox("SELECT id_ip, ip FROM  ip_desocupadas","id_ip", "ip") ?>
                        </select><a id="mip" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>


                    </div>
                </div>


                <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="Observaciones">Observaciones</label>
                        <textarea class="form-control  input-sm" id="observaciones" name="Observaciones" placeholder="Observaciones"><?php if (isset($row["observacion"])) echo $row["observacion"];?></textarea>
                    </div>

                </div>

                <!-- all modals para agregar al principio todos escondidos -->
                <div id="demo-marca" class="demo-modal" style="display: none">
                    <button type="button" name="marca" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); umarca();">Close</button>
                    <iframe src="../marca/marcas.php" width="500" height="500" id="fmarca" frameborder="0"></iframe>
                </div>

                <div id="demo-licencia" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); ulicencias();">Close</button>
                    <iframe src="../licencia/licencia.php" width="900" height="700" id="flicencia" frameborder="0"></iframe>
                </div>
                <div id="demo-responsables" class="demo-modal" style="display: none">
                    <button type="button"  class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); uresponsable();">Close</button>
                    <iframe src="../empleados/empleados.php" width="500" height="500" id="fresponsables" frameborder="0"></iframe>
                </div>

                <div id="demo-ip" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); uip();">Close</button>
                    <iframe src="../ipv4/ipv4.php" width="500" height="500" id="fip" frameborder="0"></iframe>
                </div>

                <div id="demo-disco" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); udisco();">Close</button>
                    <iframe src="../discod/discod.php" width="500" height="500" id="fdisco" frameborder="0"></iframe>
                </div>
                <div id="demo-ram" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
                    <iframe src="../ram/ram.php" width="500" height="500" id="fram" frameborder="0"></iframe>
                </div>

                <div id="demo-tvideo" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
                    <iframe src="../tvideo/tvideo.php" width="500" height="500" id="ftvideo" frameborder="0"></iframe>
                </div>
                <!-- aqui terminan los modales -->

            </div><!-- /.box-body -->

        </form>

    </div>
    <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/toastr.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script  src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script  src="../js/custombox.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <script src="controller/controllerCpuEditar.js" > </script>
</div>

</body>

<?php
function responsable($consul,$id,$nombre, $apellido)

{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row[$id]."'>";

        echo $row[$nombre]." - ".$row[$apellido];
        echo "</option>";

    }
}function cargaComboBox($consul,$id,$nombre)

{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        // $resul=mysqli_query($mysqli,$consul);
        //while ($row=mysqli_fetch_array($resul))
    {
        echo "<option value='".$row[$id]."'>";

        echo $row[$nombre];
        echo "</option>";

    }
}

function licencia($consul,$id,$nombre, $apellido, $cant_lic, $usadas)
{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        if($row[$cant_lic]==$row[$usadas]){
            echo "<option  value='".$row[$id]."' disabled=\"disabled\" >";

            echo $row[$nombre]." -  ".$row[$apellido]." no Dispo";
            echo "</option>";

        }else{

            echo "<option value='".$row[$id]."'>";

            echo $row[$nombre]." -  ".$row[$apellido];
            echo "</option>";
        }


    }
}
function discoD($consul,$id,$cap, $cant, $des, $raid)
{


    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row["$id"]."'>";
        echo $row["$cap"]."- cant:".$row[$cant]." Des:".$row[$des]." Raid:".$row[$raid];
        echo "</option>";

    }

}



function cargaComboBox3($consul,$id,$nombre, $apellido, $inp)
{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row[$id]."'>";
        echo $row[$nombre]." -  ".$row[$apellido]." - ".$row[$inp];
        echo "</option>";

    }
}
function cargaComboBoxram($consul,$id,$nombre, $apellido, $inp)
{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row[$id]."'>";
        echo "Capacidad ".$row[$nombre]." -Modulos  ".$row[$apellido]." -Voltage ".$row[$inp];
        echo "</option>";

    }
}

?>
</html>