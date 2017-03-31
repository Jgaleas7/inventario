<?php
include('../config/conexion2.php');
$id=$_GET['id'];
$mbd=DB::connect();DB::disconnect();
       $proof=$mbd->query("SELECT serie, m.nombre_marca, marca, serv_tag, tamano, inventario, tipo_monitor, observacion 
                            FROM monitor mon 
                            INNER JOIN marca m ON mon.marca=m.id_marca WHERE mon.id_monitor='$id'");
      foreach($proof as $row){
		  $row["serie"];
		  $row["marca"];
		  $row["nombre_marca"];
		  $row["serv_tag"];
		  $row["tamano"];
		  $inv=$row["inventario"];
		  $row["tipo_monitor"];
		  $row["observacion"];
	  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitor</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link href="../plugins/select2/select2.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body class="login-page">
<a  onclick="goBack()" class="btn bg-navy btn-lg">   <span class="fa fa-list"></span>
    Ver Monitores</a>
<div class="">

    <div id="cuerpo" class="col-md-10" >
        <div class="col-md-10 col-md-offset-2" >
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Añadir Monitor</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <input type="hidden" id="id" value="<?php if (isset($id)) echo $id;?>">
                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="inventario"> Numero Inventario*</label>
                                <input type="text" class="form-control  input-sm  help-block" id="inventario" value="<?php if (isset($inv)) echo $inv;?>" name="inventario" placeholder="Serie del monitor">
                            </div>


                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="marca">Marca</label>
                                <select class="js-example-basic-multiple    help-block" id="marca" name="marca" required style="width: 95%" placeholder="marca">
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
                        </div>

                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="serie"> Serie</label>
                                <input type="text" class="form-control  input-sm  help-block" id="serie" value="<?php if (isset($row["serie"])) echo $row["serie"];?>" name="serie" placeholder="Serie del monitor">
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="serv"> Service Tag</label>
                                <input type="text" class="form-control  input-sm  help-block" id="serv" value="<?php if (isset($row["serv_tag"])) echo $row["serv_tag"];?>" name="serv" placeholder="Service Tag">
                            </div>
                        </div>

                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="nombre"> Tamaño</label>
                                <input type="text" class="form-control  input-sm  help-block" id="tamano" value="<?php if (isset($row["tamano"])) echo $row["tamano"];?>" name="tamano" placeholder="Tamaño del monitor">
                            </div>


                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="tipo"> Tipo de monitor</label>
                                <select id="tipo" class="form-control  input-sm  help-block">
                                    <option <?php if (isset($row["tipo_monitor"]) && $row["tipo_monitor"]=="LCD") echo "selected";?>>LCD</option>
                                    <option <?php if (isset($row["tipo_monitor"]) && $row["tipo_monitor"]=="LED") echo "selected";?>>LED</option>
                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-10">
                                <label class="fa fa-laptop" for="monitor">CPU</label>
                                <select  class="select2 js-example-theme-multiple form-control help-block" id="cpu" name="cpu" style="width: 100%" required placeholder="Monitor" multiple="multiple">

                                    <?php
                                    $mbd=DB::connect();DB::disconnect();
                                    $proof6=$mbd->query("SELECT cpu.nombre_cpu, cpu.num_inventario  
                                                         FROM detalle_cpu_monitor INNER JOIN cpu ON id_cpu=cpu.num_inventario 
                                                         WHERE id_numinventario='$inv'");


                                    while($row6 = $row6 = $proof6->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option selected value=".$row6["num_inventario"].">".$row6["nombre_cpu"] . "-" . $row6["num_inventario"]."</option>";
                                    }
                                    cargaComboBox("SELECT num_inventario, nombre_cpu FROM cpu 
                                                    WHERE num_inventario NOT IN (SELECT id_cpu from detalle_cpu_monitor 
                                        WHERE id_numinventario='$inv')", "num_inventario", "nombre_cpu", "num_inventario");
                                    ?>

                                </select>

                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-10">
                                <label for="obs"> Observacion</label>
                                <textarea class="form-control input-group-sm" id="obs" name="obs" placeholder="Ejemplo Buen estado..."><?php if (isset($row["observacion"])) echo $row["observacion"];?></textarea>
                            </div>
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                        <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                    </div>
                </form>
                <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
                <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
                <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
                <script type="text/javascript" src="../js/toastr.js"></script>
                <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
                <script src="../dist/js/app.min.js" type="text/javascript"></script>
                <script>
                    $(document).ready(function () {
                        $("#inventario").inputmask("99-999-9999");
                        $("#marca").select2();
                        $("#cpu").select2();
                    });


                    $("#guardar").click(function()
                    {
                        var inventario= $("#inventario").val();
                        var marca = $("#marca").val();
                        var serie= $("#serie").val();
                        var service= $("#serv").val();
                        var tipo= $("#tipo").val();
                        var tamano= $("#tamano").val();
                        var obs= $("#obs").val();
                        var cpu= $("#cpu").val();
                        var id= $("#id").val();



                        if(inventario.trim()=='')
                        {
                            toastr.error("Hay campos que son obligatorios");
                            return;
                        }

                        $.ajax({
                            type:"POST",
                            url:"consultas.php",
                            data:
                                {
                                    tarea:"editar",
                                    marca:marca,
                                    inventario:inventario,
                                    tipo:tipo,
                                    serie:serie,
                                    service:service,
                                    obs:obs,
                                    tamano:tamano,
                                    cpu:cpu,
                                    id:id

                                },
                            success: function(data)
                            {
                                if(data=="bien"){
                                    toastr.success('Exito','se ha Guardado correctamnete');
                                    goBack();
                                }
                                //alert(data);
                                toastr.error("Error", "Ha ocurrido un error");
                               goBack();
                            },
                            error: function(xhr, ajaxOptions, thrownError)
                            {
                                toastr.error("Error", thrownError);
                                toastr.error("ERROR", "No funciona ajax para guardar");
                            }
                        })


                    });

                    function limpiarcampos(){
                        document.getElementById("marca").value="";
                        document.getElementById("obs").value="";
                        document.getElementById("inventario").value="";
                        document.getElementById("tamano").value="";
                        document.getElementById("tipo").value="";
                        document.getElementById("serie").value="";

                    }
                    function goBack(){
                        setTimeout(function(){  window.location.href="ver_monitores.php";  }, 30);
                    }

                </script>


            </div>
        </div>
    </div>


</body>
<?php

function cargaComboBox($consul,$id,$nombre, $apellido)
{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row["$id"]."'>";
        echo $row["$nombre"]."  ".$row["$apellido"];
        echo "</option>";
    }
}


?>
</html>