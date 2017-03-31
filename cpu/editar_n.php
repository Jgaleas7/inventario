<?php
session_start();

//if($_SESSION['tipo']!="admin"){
//  echo "<script>  window.location.href='ver_empleados.php';  alert('no tiene permisos para crear nuevos empleados');</script>";

//}
include_once '../config/conexion2.php';

$id=$_GET['id'];

$mbd=DB::connect();DB::disconnect();

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
    $row["observacion"];
    $row["clasificacion"];

}

$usuario=$mbd->query("SELECT u.nombre_usu FROM usuarios u INNER JOIN cpu c ON u.id_usuario=c.id_usuario WHERE c.num_inventario='$id'");
foreach($usuario as $usu){
    $usu["nombre_usu"];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR CPU</title>
    <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../plugins/select2/select2.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="../js/toastr.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.js" type="text/javascript"></script>
    <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>

    <script  src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker-master/daterangepicker.css" />



</head>
<body>

<!-- Button trigger modal -->
<!-- Modal previw -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmar datos</h4>
            </div>
            <div id="demo" class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="guardar" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>




<div id="cuerpo" class="col-md-10" >
    <header class="header">
        <center><strong><h3>Crear CPU</h3></strong></center>
    </header>



    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a id="previw" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-success  fa fa-save ">   Guardar</a>
                <!--<a class="btn btn-danger   fa fa-close">## Delete</a>-->
                <a onclick="goBack()" class="btn btn-warning  fa fa-arrow-circle-left">--  Regresar</a>
            </div>
            <h4 class="panel-title">Ingresar Equipo</h4>
        </div>
        <div class="panel-body">
            <!-- form start -->
            <form id="general">
                <div class="box-body">
                    <div class="row">
                        <input type="text" value="<?php if (isset($usu["nombre_usu"]))  echo  $usu["nombre_usu"];?>"  disabled class=" help-block disabled col-lg-2">
                        <input type="text" value="<?php if (isset($row["fecha_ingreso"])) echo $row["fecha_ingreso"];?>"  disabled class="help-block col-lg-2">
                        <input type="text"   value="<?php if (isset($row["num_inventario"])) echo $row["num_inventario"];?>"  disabled class="help-block col-lg-2"     id="inventario"  name="inventario">
                    </div>

                    <div class="row col-md-12 col-lg-12">
                        <div id="div_inventario" class=" col-md-4 col-sm-4 col-xs-10 form-group ">
                            <label class="control-label" for="inventario">Numero de Inventario</label>
                            <input type="text"  class="form-control  help-block has-error"  value="<?php if (isset($row["num_inventario"])) echo $row["num_inventario"];?>"      id="nuevoinventario"  name="nuevoinventario" placeholder="01-9000-3652">
                            <span id="error"  class="help-block hidden">Error con el valor ingresado</span>
                        </div>


                        <div class="form-group col-md-4  col-sm-4 col-xs-10">
                            <label for="servT">Service TAG</label>
                            <input type="text" class="form-control help-block" id="servT" name="servT" value="<?php if (isset($row["serv_tag"])) echo $row["serv_tag"];?>" required placeholder="Service Tag">
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-10">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control  help-block" value="<?php if (isset($row["serie"])) echo $row["serie"];?>" id="serie" name="serie" required placeholder="Serie">

                        </div>

                    </div>

                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                            <label for="modelo"> Modelo</label>
                            <input type="text" class="form-control help-block" id="modelo" name="modelo" value="<?php if (isset($row["modelo"])) echo $row["modelo"];?>"  required placeholder="Modelo">

                        </div>


                        <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                            <label for="puntos"> Nombre del Usuario del Equipo</label>

                            <input type="text" class="form-control input-md help-block" id="usu_cpu" name="usu_cpu" value="<?php if (isset($row["nombre_usu_cpu"])) echo $row["nombre_usu_cpu"];?>" required placeholder="Nombre de usuario">

                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-10">
                            <label for="puntos">Clasificación de Equipo</label>

                            <select  class="form-control help-block" id="clasificacion">
                                <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="Editora") echo "selected";?>  >Editora</option>
                                <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="Animadora") echo "selected";?>>Animadora</option>
                                <option<?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="Render") echo "selected";?>   >Render</option>
                                <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="Play-Out") echo "selected";?> >Play-Out</option>
                                <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="Server") echo "selected";?> >Server</option>
                                <option <?php if (isset($row["clasificacion"]) && $row["clasificacion"]=="Laptop") echo "selected";?> >Laptop</option>

                            </select>
                        </div>

                    </div>
                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="marca">Marca</label>
                            <select class="js-example-basic-multiple  form-control  help-block" id="marca" value="<?php if (isset($row["marca"])) echo $row["marca"];?>" style="width: 100%">
                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof1=$mbd->query("SELECT id_marca, nombre_marca FROM marca");




                                while($row1 = $row1 = $proof1->fetch(PDO::FETCH_ASSOC)){


                                    if($row1["id_marca"] == $row["marca"])
                                    {
                                        echo "<option selected value=".$row["marca"].">".$row1["nombre_marca"]."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=".$row1["id_marca"].">".$row1["nombre_marca"]."</option>";
                                    }
                                }

                                ?>

                            </select>

                        </div>


                        <div class="form-group  col-md-6  col-sm-6 col-xs-10">
                            <label for="puntos"> Nombre de Equipo</label>

                            <input type="text" class="form-control  help-block" id="nombre_cpu" name="nombre_cpu"  value="<?php if (isset($row["nombre_cpu"])) echo $row["nombre_cpu"];?>" required placeholder="Nombre de equipo">

                        </div>
                    </div>

                    <div class="row col-md-12 col-lg-12">
                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="ubicacion">Ubicacion</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-university"></i>
                                </div>

                                <select  class="js-example-basic-multiple select2 form-control input-md help-block" id="ubicacion" name="dept" style="width: 100%" required placeholder="depa">
                                    <?php
                                    $mbd=DB::connect();DB::disconnect();
                                    $proof1=$mbd->query("SELECT id_edificio, nombre_edificio FROM edificio");




                                    while($row1 = $row1 = $proof1->fetch(PDO::FETCH_ASSOC)){


                                        if($row1["id_edificio"] == $row["id_edificio"])
                                        {
                                            echo "<option selected value=".$row["id_edificio"].">".$row1["nombre_edificio"]."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=".$row1["id_edificio"].">".$row1["nombre_edificio"]."</option>";
                                        }
                                    }




                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos">Garantia</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-circle-o"></i>
                                </div>
                                <input type="text" class="form-control  help-block" value="<?php if (isset($row["garantia"])) echo $row["garantia"];?>" id="garantia" name="garantia" required placeholder="GARANTIA">
                            </div>
                        </div>


                    </div>


                    <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos">RAM <cite>(Capacidad/tipo/voltage)</cite></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                </div>

                                <select class="form-control help-block" id="ram" value="<?php if (isset($row["id_ram"])) echo $row["id_ram"];?>" style="width: 100%">
                                    <?php
                                    $mbd=DB::connect();DB::disconnect();
                                    $proof2=$mbd->query("SELECT * FROM ram");




                                    while($row2 = $row2 = $proof2->fetch(PDO::FETCH_ASSOC)){


                                        if($row2["id_ram"] == $row["id_ram"])
                                        {
                                            echo "<option selected value=".$row["id_ram"].">".$row2["capacidad"]." - ".$row2["tipo_ram"]." - ".$row2["voltage"]."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=".$row2["id_ram"].">".$row2["capacidad"]." - ".$row2["tipo_ram"]." - ".$row2["voltage"]."</option>";
                                        }
                                    }




                                    ?>


                                </select>
                            </div>
                        </div>

                        <div class="form-groupcol-md-6 col-sm-6 col-xs-10">
                            <label for="tvideo">Tarjeta de video <comment class="disabled">(marca/modelo/memoria)</comment></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <select class="js-example-basic-multiple select2 form-control help-block" id="tvideo" style="width: 100%">
                                    <?php
                                    $mbd=DB::connect();DB::disconnect();
                                    $proof3=$mbd->query("SELECT id_tvideo, m.nombre_marca, modelo, memoria FROM tarj_video tv INNER JOIN marca m ON tv.marca=m.id_marca ");


                                    while($row3 = $row3 = $proof3->fetch(PDO::FETCH_ASSOC)){


                                        if($row3["id_tvideo"] == $row["id_tarjetaV"])
                                        {
                                            echo "<option selected value=".$row["id_tarjetaV"].">".$row3["nombre_marca"]." - ".$row3["modelo"]." - ".$row3["memoria"]."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=".$row3["id_ram"].">".$row3["nombre_marca"]." - ".$row3["modelo"]." - ".$row3["memoria"]."</option>";
                                        }
                                    }




                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group  col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-users" for="puntos">Usuarios</label>

                            <select class="js-example-basic-multiple select2 form-control help-block"  id="empleados" name="empleados" required style="width: 100%" placeholder="EMPLEADOS" multiple="multiple">
                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof5=$mbd->query("SELECT id_det_empleado, id_numinventario, id_empleado, e.nombre, e.apellido FROM detalle_cpu_empleados 
                                                      INNER JOIN empleados e ON id_empleado=e.id WHERE id_numinventario='$id'");

                                while($row5 = $row5 = $proof5->fetch(PDO::FETCH_ASSOC)) {


                                    echo "<option selected value=" . $row5["id_empleado"] . ">" . $row5["nombre"] . " " . $row5["apellido"] . "</option>";
                                }
                                cargaComboBox("SELECT  e.nombre, e.apellido, e.id FROM empleados e
 WHERE   e.id NOT IN  (  SELECT id_empleado 
  FROM detalle_cpu_empleados  WHERE id_numinventario ='$id' )","id","nombre","apellido");

                                ?>
                            </select>
                        </div>


                        <div class="form-group  col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-unlock" for="licencia">Licencia</label>


                            <select class="js-example-basic-multiple  form-control input-md help-block" id="licencia" name="licencia" required style="width: 100%" placeholder="LICENCIA" multiple="multiple">
                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof8=$mbd->query("SELECT dl.id_licencia, l.fabricante, l.nombre FROM detalle_cpu_licencia dl 
                                                      INNER join licencia l on dl.id_licencia=l.id_licencia WHERE dl.id_numinventario='$id'");




                                while($row8 = $row8 = $proof8->fetch(PDO::FETCH_ASSOC)) {


                                    echo "<option selected value=" . $row8["id_licencia"] . ">" . $row8["fabricante"] . " " . $row8["nombre"] . "</option>";
                                }
                                licencia("select id_licencia, fabricante, nombre, usadas, cant_lic from vista_licencia
                                         where id_licencia NOT IN (SELECT id_licencia from detalle_cpu_licencia 
                                         WHERE id_numinventario= '$id')","id_licencia","nombre","fabricante", "cant_lic","usadas");

                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row col-md-12 col-lg-12">
                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-save" for="discoD">Disco Duro</label>


                            <select class="js-example-basic-multiple select2 form-control input-md help-block" id="discoD"  name="Disco_Duro"  required style="width: 100%" placeholder="Disco duro" multiple="multiple">
                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof8=$mbd->query("SELECT   dtd.id_disco, d.marca, d.almacenamiento FROM detalle_cpu_discod dtd 
                                                      INNER JOIN disco_duro d ON dtd.id_disco=d.id_discoDuro WHERE dtd.id_numinventario='$id'");




                                while($row8 = $row8 = $proof8->fetch(PDO::FETCH_ASSOC)) {


                                    echo "<option selected value=" . $row8["id_disco"] . ">" . $row8["marca"] . " " . $row8["almacenamiento"] . "</option>";
                                }
                                cargaComboBox("SELECT d.marca, d.almacenamiento, d.id_discoDuro FROM disco_duro d  WHERE   d.id_discoDuro NOT IN  (  SELECT dd.id_disco 
                                               FROM detalle_cpu_discod dd  WHERE dd.id_numinventario = '$id')","id_discoDuro ","marca","almacenamiento");

                                ?>
                            </select>
                        </div>




                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-desktop" for="monitor">Monitor</label>

                            <select  class="js-example-basic-multiple select2 input-md help-block" id="monitor" name="monitor" style="width: 100%" required placeholder="Monitor" multiple="multiple">
                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof6=$mbd->query("SELECT dm.id_monitor, mar.nombre_marca, m.serie, m.inventario FROM detalle_cpu_monitor dm 
                                                       INNER JOIN monitor m ON dm.id_monitor=m.id_monitor 
                                                      INNER JOIN marca mar ON m.marca=mar.id_marca WHERE dm.id_numinventario='$id'");


                                while($row6 = $row6 = $proof6->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option selected value=" . $row6["id_monitor"] . ">" . $row6["nombre_marca"] . "-" . $row6["inventario"] ."-". $row6["serie"]. "</option>";
                                }

                                cargaComboBox3("SELECT   mon.id_monitor, mon.serie, m.nombre_marca, mon.inventario FROM monitor mon 
                                                INNER JOIN marca m ON mon.marca=m.id_marca
                                                 WHERE   mon.id_monitor NOT IN  (  SELECT id_monitor 
                                                  FROM detalle_cpu_monitor  WHERE id_numinventario ='$id')","id_monitor","nombre_marca","inventario","serie");

                                ?>
                            </select>

                        </div>

                    </div>
                    <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos">Estado</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-circle-o"></i>
                                </div>
                                <select class="form-control help-block" value="<?php if (isset($row["estado"])) echo $row["estado"];?>" id="estado">
                                    <option <?php if (isset($row["estado"]) && $row["estado"]=="Operando") echo "selected";?> >Operando</option>
                                    <option <?php if (isset($row["estado"]) && $row["estado"]=="Desechado") echo "selected";?>>Desechado</option>
                                    <option <?php if (isset($row["estado"]) && $row["estado"]=="Bodega") echo "selected";?>>Bodega</option>
                                    <option <?php if (isset($row["estado"]) && $row["estado"]=="Prestamo") echo "selected";?>>Prestamo</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos">IP del Equipo</label>


                            <select  class="js-example-basic-multiple select2 input-md help-block" id="ip" name="ip" style="width: 100%" required placeholder="Ip" multiple="multiple">
                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof9=$mbd->query("SELECT di.id_ip, i.ip  from detalle_cpu_ip di INNER JOIN ipv4 i ON i.id_ip=di.id_ip where id_numinventario='$id'");

                                while($row9 = $row9 = $proof9->fetch(PDO::FETCH_ASSOC)) {


                                    echo "<option selected value=" . $row9["id_ip"] . ">".$row9["ip"]."</option>";
                                }
                                cargaComboBox("SELECT ip.id_ip, ip.ip  from ipv4 ip  where ip.id_ip NOT IN (select id_ip from detalle_cpu_ip )", "id_ip", "ip");

                                ?>
                            </select>

                        </div>


                    </div>

                </div>


                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="Observaciones">Observaciones</label>
                    <textarea type="text" class="form-control input-lg" id="observaciones" name="Observaciones" placeholder="Observaciones"><?php if (isset($row["observacion"])) echo $row["observacion"];?> </textarea>
                </div>

        </div><!-- /.box-body -->



        </form>
    </div>
</div>





<script>

    $(document).ready(function(){

        $("#nuevoinventario").inputmask("99-999-9999");
        $("#empleados").select2();
        $("#discoD").select2();
        $("#monitor").select2();
        $("#licencia").select2();
        $("#dept").select2();
        $("#ram").select2();
        $("#tvideo").select2();
        $("#marca").select2();
        $("#empleados").val();
        $("#ip").select2();



        $('input[name="garantia"]').daterangepicker({
            timepicker:false,
            opens: "center",
            cancelClass: "btn-danger",
            locale:{
                format:'YYYY/MM/DD'
            }
        });


        $('input[name="fingreso"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });
        function verificaId(id) {
            $.ajax(
                {
                    type: "POST",
                    url: "consultas_cpu.php",
                    data: {
                        tarea: 'verifica',
                        id: id

                    },
                    success: function (data){
                        if(data=="existe"){
                            toastr.warning("Advertencia", "Este numero de inventario ya existe");
                            return;
                        }if(data.length==11){
                            $("#div_inventario").removeClass("has-error");
                            $("#div_inventario").addClass("has-success");
                            $("#error").addClass("hidden");
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
        }

        $("#nuevoinventario").focusout(function() {
            var x=this.value.replace(new RegExp('_', 'g'),"");

            this.value = (this.value + '').replace(/[^0-9]/g, '');
            verificaId($(this).val());

            var maxChars = 11;
            if (x.length < maxChars) {

                toastr.error("Error","error al ingresar numero de inventario imcompleto");
                $("#div_inventario").removeClass("has-success");
                $("#div_inventario").addClass("has-error");
                $("#error").removeClass("hidden");

            }
            if($(this).val().length == maxChars){
                $("#div_inventario").removeClass("has-error");
                $("#div_inventario").addClass("has-success");
                $("#error").addClass("hidden");

            }
        });
    });




    $("#previw").click(function () {
        var alldata = $("form").serializeArray();
        var j=  JSON.stringify(alldata);

        console.log(j);
        var data=JSON.parse(j);
        $( "#demo" ).empty();
        console.log(data);
        for(var i=0;i<data.length;i++){
            console.log(data[i].value);
            $( "#demo" ).append(data[i].name+" ",  data[i].value, "<br>" );
        }
    });

    $("#guardar").click(function()
    {


        var nuevoinventario = $("#nuevoinventario").val();
        var num_inventario = $("#inventario").val();
        var serie = $("#serie").val();
        var modelo = $("#modelo").val();
        var marca = $("#marca").val();
        var servT= $("#servT").val();
        var nombre_cpu = $("#nombre_cpu").val();
        var ram = $("#ram").val();
        var tvideo = $("#tvideo").val();
        var estado = $("#estado").val();

        var obs = $("#observaciones").val();
        var garantia = $("#garantia").val();
        var monitor = $("#monitor").val();
        var discoD = $("#discoD").val();
        var empleados = $("#empleados").val();
        var licencia = $("#licencia").val();
        var clasificacion = $("#clasificacion").val();
        var usu_cpu = $("#usu_cpu").val();
        var ip = $("#ip").val();
        var ubicacion = $("#ubicacion").val();

        if(num_inventario.trim()=='' && nuevoinventario.trim()=='')
        {
            toastr.error("Hay campos que son obligatorios");
            return;
        }

        if(num_inventario.length!=11){
            toastr.error('Error',' inventario solo son 11 valores');

            return;

        }
        $.ajax({
            type:"POST",
            url:"consultas_cpu.php",
            data:
                {
                    tarea:"editar",

                    nuevoinventario:nuevoinventario,
                    num_inventario:num_inventario,
                    serie:serie,
                    modelo:modelo,
                    marca:marca,
                    servT:servT,
                    nombre_cpu: nombre_cpu,
                    ram:ram,
                    tvideo: tvideo,
                    estado:estado,
                    ubicacion:ubicacion,
                    obs:obs,
                    garantia:garantia,
                    monitor:monitor,
                    disco:discoD,
                    empleados:empleados,
                    licencia:licencia,
                    clasificacion:clasificacion,
                    usu_cpu:usu_cpu,
                    ip:ip

                },
            success: function(data)
            {
                alert(data);
                if(data=="Errorconsulta"){

                    toast.error('error', 'ingrese num inventario valido');
                    return;
                     }

                toastr.success('Exito','se ha Guardado correctamnete');
                limpiarcampos();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                alert(thrownError);
                toast.error("No funciona ajax para Editar");
            }
        })

    });

    function limpiarcampos(){ setTimeout(function () { document.getElementById("nuevoinventario").value=""; }, 300); }
    function goBack(){ setTimeout(function(){  window.location.href="ver-ot.php";  }, 30); }


</script>
</div>
</div>



</body>

<?php
function cargaComboBox($consul,$id,$nombre, $apellido)

{
    include('../config/conexion.php');
    $resul=mysqli_query($mysqli,$consul);
    while ($row=mysqli_fetch_array($resul))
    {
        echo "<option value='".$row[$id]."'>";

        echo $row[$nombre]." -  ".$row[$apellido];
        echo "</option>";

    }
}

function licencia($consul,$id,$nombre, $apellido, $cant_lic, $usadas)

{
    include('../config/conexion.php');
    $resul=mysqli_query($mysqli,$consul);
    while ($row=mysqli_fetch_array($resul))
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

function cargaComboBox3($consul,$id,$nombre, $apellido, $inp)
{
    include('../config/conexion.php');
    $resul=mysqli_query($mysqli,$consul);
    while ($row=mysqli_fetch_array($resul))
    {
        echo "<option value='".$row[$id]."'>";
        echo $row[$nombre]." -  ".$row[$apellido]." - ".$row[$inp];
        echo "</option>";

    }
}

?>
</html>