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
    $row["id_departamento"];
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar CPU</title>
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
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker-master/daterangepicker.css" />


</head>
<body>

<!-- Button trigger modal -->

<!-- Modal -->
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





<div id="cuerpo" class="col-md-8" >
    <header class="header">
        <center><strong><h3>Editar CPU</h3></strong></center>
    </header>


    <div class="container">

        <nav class=" nav navbar navbar-nav navbar-fixed-top navbar-default collapse navbar-collapse"  >
            <ul class="nav navbar-nav " >
                <button type="button" id="previw" class="btn  btn-success btn-lg fa fa-save  " data-toggle="modal" data-target="#myModal">Guardar/Actualizar CPU</button>
                <button type="reset"  class="btn  btn-danger btn-lg fa fa-close">Cancelar</button>
                <button  onclick="goBack()" class="btn btn-warning btn-lg fa fa-arrow-circle-left">
                    Regresar</button>
            </ul>
            <!-- <button class="btn  btn-app glyphicon glyphicon-resize-small "  id="hide" name="hide" >Esconder</button>
             <button id="show" class="btn  btn-app glyphicon glyphicon-resize-full" name="hide" >Mostrar</button> -->
        </nav>
    </div>



    <div class="panel panel-primary">
        <div class="panel-heading">EDITAR INFORMACION  DEL CPU</div>
        <div class="panel-body">
            <!-- form start -->
            <form id="general">
                <div class="box-body">
                    <div class="row">
                    <input type="text" value="<?php if (isset($row["id_usuario"]))  echo $row["id_usuario"];?>"  disabled class=" help-block col-lg-2">
                    <input type="text" value="<?php if (isset($row["fecha_ingreso"])) echo $row["fecha_ingreso"];?>"  disabled class="help-block col-lg-2">
                    </div>


                            <input type="hidden" disabled value="<?php if (isset($row["num_inventario"])) echo $row["num_inventario"];?>"  class="form-control input-md help-block" id="inventario"  name="inventario" placeholder="0190003652">


                        <div class="row">
                        <div class=" col-md-6">
                            <label for="numeroC">Numero de Inventario</label>
                            <input type="text"  value="<?php if (isset($row["num_inventario"])) echo $row["num_inventario"];?>"  class="form-control input-md help-block" id="nuevoinventario"  name="inventario" placeholder="0190003652">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="saldo">Marca</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check"></i>
                                </div>

                                <select class="js-example-basic-multiple  form-control  help-block" value="<?php if (isset($row["marca"])) echo $row["marca"];?>"  id="marca" name="marca" required style="width: 100%" placeholder="marca">
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

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="puntos">Serie</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <input type="text" value="<?php if (isset($row["serie"])) echo $row["serie"];?>" class="form-control input-md help-block" id="serie" name="serie" required placeholder="Serie">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="puntos">Service TAG</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-square"></i>
                                </div>
                                <input type="text" class="form-control input-md help-block" value="<?php if (isset($row["serv_tag"])) echo $row["serv_tag"];?>" id="servT" name="servT" required placeholder="Service Tag">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="puntos"> Modelo</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-square"></i>
                                </div>
                                <input type="text" class="form-control input-md help-block" value="<?php if (isset($row["modelo"])) echo $row["modelo"];?>" id="modelo" name="modelo" required placeholder="Modelo">
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="puntos"> Nombre de Equipo</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-square"></i>
                                </div>
                                <input type="text" class="form-control input-md help-block" value="<?php if (isset($row["nombre_cpu"])) echo $row["nombre_cpu"];?>" id="nombre_cpu" name="nombre_cpu" required placeholder="Nombre de equipo">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="fa fa-users" for="puntos">Usuarios</label>

                            <select class="js-example-basic-multiple select2 js-example-tags form-control input-md help-block"  id="empleados" name="empleados" required style="width: 100%" placeholder="EMPLEADOS" multiple="multiple">

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


                        <div class="form-group col-md-6">
                            <label for="puntos">Garantia</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-circle-o"></i>
                                </div>
                                <input type="text" class="form-control input-md help-block" value="<?php if (isset($row["garantia"])) echo $row["garantia"];?>" id="garantia" name="garantia" required placeholder="GARANTIA">
                            </div>
                        </div>


                    </div>


                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="puntos">RAM</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                </div>

                                <select class="form-control help-block" value="<?php if (isset($row["id_ram"])) echo $row["id_ram"];?>"  id="ram" style="width: 98%">

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

                        <div class="form-group col-md-6">
                            <label for="tvideo">Tarjeta de video </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <select class="js-example-basic-multiple select2 form-control help-block" value="<?php if (isset($row["id_tarjetaV"])) echo $row["id_tarjetaV"];?>" id="tvideo" style="width: 98%">

                                        <?php
                                        $mbd=DB::connect();DB::disconnect();
                                        $proof3=$mbd->query("SELECT * FROM tarj_video");


                                        while($row3 = $row3 = $proof3->fetch(PDO::FETCH_ASSOC)){


                                            if($row3["id_tvideo"] == $row["id_tarjetaV"])
                                            {
                                                echo "<option selected value=".$row["id_tarjetaV"].">".$row3["marca"]." - ".$row3["modelo"]." - ".$row3["memoria"]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value=".$row3["id_ram"].">".$row3["marca"]." - ".$row3["modelo"]." - ".$row3["memoria"]."</option>";
                                            }
                                        }




                                        ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="dept">Deparatamento</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-university"></i>
                                </div>

                                <select  class="js-example-basic-multiple select2 form-control input-md help-block" value="<?php if (isset($row["id_departamento"])) echo $row["id_departamento"];?>" id="dept" name="dept" style="width: 100%" required placeholder="depa">

                                    <?php
                                    $mbd=DB::connect();DB::disconnect();
                                    $proof4=$mbd->query("SELECT dep.id_departamento,  nombre_dep, c.nombre, ed.nombre_edificio  FROM departamento dep INNER JOIN
                                                                 ciudad c ON dep.id_ciudad=c.id_ciudad
                                                                 INNER JOIN edificio ed ON dep.id_edificio=ed.id_edificio");


                                    while($row4 = $row3 = $proof4->fetch(PDO::FETCH_ASSOC)){


                                        if($row4["id_departamento"] == $row["id_departamento"])
                                        {
                                            echo "<option selected value=".$row["id_departamento"].">".$row3["nombre_dep"]." - ".$row3["nombre"]." - ".$row3["nombre_edificio"]."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=".$row3["id_departamento"].">".$row3["nombre_dep"]." - ".$row3["nombre"]." - ".$row3["nombre_edificio"]."</option>";
                                        }
                                    }




                                    ?>



                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label class="fa fa-unlock" for="licencia">Licencia</label>


                            <select class="js-example-basic-multiple select2-hidden-accessible  form-control input-md help-block" value="3,4" id="licencia" name="licencia" required style="width: 100%" placeholder="LICENCIA" multiple="multiple">

                                <?php
                                $mbd=DB::connect();DB::disconnect();
                                $proof5=$mbd->query("SELECT id_numinventario, dl.id_licencia, li.nombre, li.fabricante FROM detalle_cpu_licencia dl
                                                      INNER JOIN licencia li ON dl.id_licencia=li.id_licencia WHERE id_numinventario='$id'");




                                while($row5 = $row5 = $proof5->fetch(PDO::FETCH_ASSOC)) {


                                    echo "<option selected value=" . $row5["id_licencia"] . ">" . $row5["nombre"] . " " . $row5["fabricante"] . "</option>";
                                }
                                cargaComboBox("SELECT li.fabricante, li.nombre, li.id_licencia FROM licencia li
                                                WHERE   li.id_licencia NOT IN  (  SELECT dl.id_licencia
                                                FROM detalle_cpu_licencia dl  WHERE dl.id_numinventario ='$id')","id_licencia","nombre","fabricante");

                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="fa fa-save" for="discoD">Disco Duro</label>


                            <select class="js-example-basic-multiple select2 form-control input-md help-block" id="discoD"  name="Disco_Duro"  required style="width: 95%" placeholder="Disco duro" multiple="multiple">
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




                        <div class="form-group col-lg-6">
                            <label class="fa fa-desktop" for="monitor">Monitor</label>


                            <select  class="js-example-basic-multiple select2 form-control input-md help-block" id="monitor" name="monitor" style="width: 95%" required placeholder="Monitor" multiple="multiple">
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
                    <div class="row">

                        <div class="form-group col-lg-6">
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

                        <div class="form-group col-md-6">
                            <label for="puntos"> Nombre del Usuario del Equipo</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-check-square"></i>
                                </div>
                                <input type="text" class="form-control input-md help-block" value="<?php if (isset($row["nombre_usu_cpu"])) echo $row["nombre_usu_cpu"];?>" id="usu_cpu" name="usu_cpu" required placeholder="Nombre de usuario">
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="Observaciones">Observaciones</label>
                        <textarea type="text" class="form-control input-lg" id="observaciones" name="Observaciones" placeholder="Observaciones"></textarea>
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer">


                </div>
            </form>
        </div>
    </div>





    <script>

        $(document).ready(function(){

            $("#nuevoinventario").inputmask("99999-9999");
            $("#empleados").select2();
            $("#discoD").select2();
            $("#monitor").select2();
            $("#licencia").select2({
                tags: true
            });
            $("#dept").select2();
            $("#ram").select2();
            $("#tvideo").select2();
            $("#marca").select2();




            $('input[name="garantia"]').daterangepicker({
                timepicker:false,
                locale:{
                    format:'YYYY/MM/DD'
                }
            });


            $('input[name="fingreso"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });

            $("#nuevoinventario").keyup(function() {
                this.value = (this.value + '').replace(/[^0-9]/g, '');

                var maxChars = 10;
                if ($(this).val().length > maxChars) {
                   // $(this).val($(this).val().substr(0, maxChars));

                    //Take action, alert or whatever suits
                    alert("Este campo solo puede tener 10 Digitos");
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


            var num_inventario = $("#inventario").val();

            var nuevoinventario = $("#nuevoinventario").val();
            var serie = $("#serie").val();
            var modelo = $("#modelo").val();
            var marca = $("#marca").val();
            var servT= $("#servT").val();
            var nombre_cpu = $("#nombre_cpu").val();
            var ram = $("#ram").val();
            var tvideo = $("#tvideo").val();
            var estado = $("#estado").val();
            var dept = $("#dept").val();
            var obs = $("#observaciones").val();
            var garantia = $("#garantia").val();

            var monitor = $("#monitor").val();
            var discoD = $("#discoD").val();
            var empleados = $("#empleados").val();
            var licencia = $("#licencia").val();
            var usu_cpu = $("#usu_cpu").val();

            alert(monitor+" "+discoD+" "+empleados+" "+licencia);

            if(num_inventario.trim()=='')
            {
                toastr.error("Hay campos que son obligatorios");
                return;
            }

            if(nuevoinventario.length!=10){
                toastr.error('Error',' inventario solo son 9 numeros');

                return;

            }


            $.ajax({
                type:"POST",
                url:"consultas_cpu.php",
                data:
                    {
                        tarea:"editar",
                        num_inventario:num_inventario,
                        serie:serie,
                        modelo:modelo,
                        marca:marca,
                        servT:servT,
                        nombre_cpu: nombre_cpu,
                        ram:ram,
                        tvideo: tvideo,
                        estado:estado,
                        dept:dept,
                        obs:obs,
                        garantia:garantia,
                        monitor:monitor,
                        disco:discoD,
                        empleados:empleados,
                        licencia:licencia,
                        nuevoinventario:nuevoinventario,
                        usu_cpu:usu_cpu




                    },
                success: function(data)
                {
                    alert(data);
                    if(data=="Error"){

                        toast.error('error', 'ingrese numero de inventario');
                        return;
                    }

                    toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    toast.error("No funciona ajax para guardar");
                }
            })

        });

        function limpiarcampos(){
            document.getElementById("identidad").value="";

            document.getElementById("nombre").value="";
            document.getElementById("apellido").value="";
            document.getElementById("sexo").value="";


        }
        function goBack(){


            setTimeout(function(){  window.location.href="ver-ot.php";  }, 30);

        }

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
        echo $row[$nombre]."  ".$row[$apellido];
        echo "</option>";

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