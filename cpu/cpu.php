<?php
include('../config/conexion2.php');
session_start();

//if($_SESSION['tipo']!="admin"){
//  echo "<script>  window.location.href='ver_empleados.php';  alert('no tiene permisos para crear nuevos empleados');</script>";
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR CPU</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/AdminLTE.min.css">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
    <link type="text/css" href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker-master/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../css/custombox.min.css">
    <link rel="stylesheet" type="text/css" href="../css/toastr.css">
</head>
<body class="login-page">
<section class="content-header">
    <h1>
        CPU
        <small>Añadir CPU</small>
    </h1>
    <ol class="breadcrumb">
        <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >CPU</a></li>
        <li class="active">Añadir CPU</li>
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
                <!--<iframe src="../ram/buscar_ram.php" height="460" width="450" id="iframeram" allowfullscreen frameborder="0" ></iframe> -->

                <label for="capacidadRam">Capacidad Ram</label>
                <input type="text" id="capacidadRam" autocomplete="on"  class="input-sm form-control" placeholder="capacidad"><br>

                <label for="tipoRam">Tipo de RAM</label>
                <select id="tipoRam" class="input-sm form-control" style="width:100%">
                    <option value="sdram">SDRAM</option>
                    <option value="ddr">DDR</option>
                    <option  value="drr1">DDR1</option>
                    <option value="drr2">DDR2</option>
                    <option value="drr3">DDR3</option>
                    <option value="drr4">DDR4</option>
                </select>

                <label for="numModulos">Num. Modulos</label>
                <input type="number" id="numModulos" autocomplete="on" class="input-sm form-control" placeholder="num Modulos">

                <label for="frecuenciaram">Frecuencia</label>
                <select  id="frecuenciaram" class="input-sm form-control" style="width:100%">
                    <option value="1">533 MHz.</option>
                    <option value="2">667 MHz.</option>
                    <option value="3">883 MHz.</option>
                    <option value="4">1,333 MHz.</option>
                    <option value="5">1600 MHz.</option>
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
                T video
            </div>
            <div id="demo" class="modal-body">
                <!--<iframe src="../tvideo/buscar_tvideo.php" height="460" width="450" id="iframetvideo" allowfullscreen frameborder="0" ></iframe>-->
                <label for="marcatv">Marca</label>
                <select id="marcatv" class="form-control input-sm" style="width: 100%">
                    <?php cargaComboBox("select * from marca", "id_marca", "nombre_marca"); ?>
                </select>
                <label for="modelotv">Modelo</label>
                <input type="text" id="modelotv" autocomplete="on" class="form-control input-sm" placeholder="modelo ej quadro ...">
                <label for="capacidadtv">Capacidad</label>
                <select id="capacidadtv" class="form-control input-sm" style="width: 100%">
                    <option value="1">Incorpoada</option>
                    <option value="2">256 MB</option>
                    <option value="3">512 MB</option>
                    <option value="4">128 MB</option>
                    <option value="5">1 GB</option>
                    <option value="6">2 GB</option>
                    <option value="7">3 GB</option>
                    <option value="8">4 GB</option>
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
                <input type="text" id="hddtotal" autocomplete="on" class="form-control input-sm" placeholder="HDD total">
                <label for="cantidadhdd">Cantidad HDD</label>
                <input type="number" id="cantidadhdd" autocomplete="on" class="form-control input-sm" placeholder="Cantidad HDD...">
                <label for="descripcionhdd">Descripcion HDD</label>
                <input type="text" id="descripcionhdd" class="form-control input-sm" placeholder="Descripcion HDD">
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
            <h4 class="box-title">Añadir Equipo</h4>
         </div>

            <!-- form start -->
            <form>
                <div class="box-body">

                                <div class="row col-md-12 col-lg-12">
                    <div id="div_inventario" class=" col-md-4 col-sm-4 col-xs-10 form-group ">
                        <label class="control-label" for="inventario">Numero de Inventario</label>
                        <input type="text" class="form-control input-sm help-block has-error"    id="inventario"  name="inventario" placeholder="num Inventario">
                        <span id="error"  class="help-block hidden">Error con el valor ingresado</span>
                    </div>


                                    <div class="form-group col-md-4  col-sm-4 col-xs-10">
                                        <label for="servT">Service TAG</label>
                                        <input type="text" class="form-control input-sm help-block" id="servT" name="servT" required placeholder="Service Tag">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label style="width: inherit" for="marca">Marcas.</label>
                                        <select class=" help-block" id="marca" name="marca" required style="width: 90%"  >
                                            <?php cargaComboBox("SELECT * FROM marca","id_marca","nombre_marca") ?>
                                        </select><a id="mmarca" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>
                                    </div>


                                </div>

                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                            <label for="modelo"> Modelo</label>
                            <input type="text" class="form-control input-sm help-block" id="modelo" name="modelo" required placeholder="Modelo">

                        </div>


                        <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                            <label for="puntos"> Nombre del Usuario del Equipo</label>
                                <input type="text" class="form-control input-sm help-block" id="usu_cpu" name="usu_cpu" required placeholder="Nombre de usuario">
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-10">
                            <label for="clasificacion">Clasificación de Equipo</label>

                            <select  class="form-control input-sm help-block " id="clasificacion" style="width: 100%">
                                <option value="1">Render</option>
                                <option value="2">Audio</option>
                                <option value="3">Desktop</option>
                                <option value="4">Editora Movil</option>
                                <option value="5">ENL</option>
                                <option value="6">Generador de Caracteres</option>
                                <option value="7">Loop</option>
                                <option value="8">Prompter</option>
                                <option value="9">Servidor</option>
                                <option value="10">Visualizadoras</option>
                                <option value="11">Workstation Animación</option>
                                <option value="12">Portatil</option>
                                <option value="13">Servidor Play-Out</option>
                            </select>
                        </div>

                    </div>

                                <div class="row col-md-12 col-lg-12">

                                    <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                                        <label for="puntos"> Nombre de Equipo</label>

                                        <input type="text" class="form-control input-sm  help-block" id="nombre_cpu" name="nombre_cpu" required placeholder="Nombre de equipo">

                                    </div>

                                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                                        <label for="puntos">Garantia</label>
                                        <input type="text" class="form-control input-sm  help-block" id="garantia" name="garantia"  required placeholder="GARANTIA">

                                    </div>

                                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                                        <label for="ubicacion">Edificio</label>

                                        <select  class="form-control input-sm  help-block" id="ubicacion" name="ubicacion" style="width: 100%" required>
                                            <?php cargaComboBox("select * from edificio","id_edificio","nombre_edificio") ?>
                                        </select>
                                    </div>

                                </div>

                    <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="ram">RAM</label>
                        <div class="input-group margin ">

                            <input type="text" id="ram" disabled class="form-control input-sm">

                            <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#modalram" class="btn btn-info input-sm btn-flat "><i class="fa fa-plus"></i></button>
                    </span>
                        </div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="tvideo">T Video</label>
                        <div class="input-group margin ">
                            <input type="text" id="tvideo" disabled class="form-control input-sm">
                            <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#modaltvideo" class="btn btn-info input-sm btn-flat"><i class="fa fa-plus"></i></button>

                    </span>
                        </div>
                        </div>

                    </div>

                    <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="estado">Estado</label>

                            <select class="form-control input-sm  help-block" style="width: 100%" id="estado">
                                <option>Operando</option>
                                <option>Desechado</option>
                                <option>Bodega</option>
                                <option>Prestamo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label for="procesador">Procesador</label>
                            <input type="text" class="form-control  input-sm help-block" id="procesador" name="procesador"  placeholder="procesador">

                        </div>

                        </div>

                            <div class="row col-md-12 col-lg-12 ">

                               <div class="form-group col-lg-6  col-md-6 col-sm-6 col-xs-12">
                                    <label style="width: inherit"  for="empleados">Responsables</label>
                                    <select class=" select2  help-block"  id="empleados" name="empleados" required style="width:90%"  multiple="multiple">
                                        <?php responsable("SELECT * FROM `empleados`","id","nombre","apellido") ?>
                                    </select><a id="mresponsable" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>
                               </div>

                                <div class="form-group col-lg-6  col-md-6 col-sm-6 col-xs-12">
                                    <label style="width: inherit"  for="licencia">Licencias.</label>
                                    <select  class="select2   help-block" id="licencia"  style="width: 90%"  multiple="multiple">
                                        <?php licencia("SELECT * FROM `vista_licencia`","id_licencia","nombre","fabricante", "cant_lic","usadas") ?>
                                    </select><a id="mlicencia" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>

                                </div>


                        </div>


                            <div class="row col-md-12 col-lg-12">


                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="dduro">Disco Duro</label>
                                    <div class="input-group margin ">

                                        <input type="text" id="dduro" disabled class="form-control input-sm">
                                        <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#modalDisco" class="btn btn-info input-sm btn-flat "><i class="fa fa-plus"></i></button>
                     <!-- <button type="button" id="eliminarDisco"  class="btn btn-danger input-sm btn-flat "><i class="fa fa-trash"></i></button>
                                            <!--<button type="button" id="pruebaRam"  class="btn bg-navy input-sm btn-flat"><i class="fa fa-plus"></i></button>-->
                    </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                    <label style="width: inherit"  for="ip"  class="control-label">IP del Equipo</label>
                                    <select  class="select2 form-control input-sm help-block" id="ip" name="ip" style="width: 90%"  multiple="multiple">
                                        <?php cargaComboBox("SELECT id_ip, ip FROM  ip_desocupadas","id_ip", "ip") ?>
                                    </select><a id="mip" class="btn bg-navy btn-flat fa fa-plus " style="width: 10%" ></a>


                                </div>
                            </div>


                    <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12">



                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="Observaciones">Observaciones</label>
                            <textarea class="form-control  input-sm" id="observaciones" name="Observaciones" placeholder="Observaciones"></textarea>
                        </div>

                    </div>

<!-- all modals para agregar al principio todos escondidos -->
                <div id="demo-marca" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); umarca();">Close</button>
                    <iframe src="../marca/marcas.php" width="500" height="500" id="fmarca" frameborder="0"></iframe>
                </div>

                <div id="demo-licencia" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); ulicencias();">Close</button>
                    <iframe src="../licencia/licencia.php" width="900" height="700" id="flicencia" frameborder="0"></iframe>
                </div>
                <div id="demo-responsables" class="demo-modal" style="display: none">
                    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close(); uresponsable();">Close</button>
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
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/toastr.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script  src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script  src="../js/custombox.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <script src="controller/controllerCpu.js"></script>
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
}

function cargaComboBox($consul,$id,$nombre)

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
       // $row[$cant_lic]==$row[$usadas]
        if($row[$usadas]>= $row[$cant_lic] ){
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