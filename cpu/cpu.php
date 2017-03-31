<?php
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
    <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../plugins/select2/select2.css" rel="stylesheet">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker-master/daterangepicker.css" />
    <script type="text/javascript" src="../js/toastr.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.js" type="text/javascript"></script>
    <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>

    <script  src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>


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

<!-- Button trigger modal -->
<!-- Modal para agregar y buscar-->
<div class="modal fade" id="multiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div id="demo" class="modal-body">
                <iframe id="multiframe" allowfullscreen frameborder="0" ></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addbtn" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>




<div id="cuerpo" class="col-md-12" >


    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a id="previw" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-success  fa fa-save ">   Guardar</a>
                <a onclick="goBack()" class="btn btn-warning  fa fa-arrow-circle-left">--  Regresar</a>
            </div>
            <h4 class="panel-title">Añadir Equipo</h4>
         </div>
        <div class="panel-body">
            <!-- form start -->
            <form id="general">
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

                                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                                        <label for="serie">Serie</label>
                                       <input type="text" class="form-control  input-sm help-block" id="serie" name="serie" required placeholder="Serie">

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
                            <label for="puntos">Clasificación de Equipo</label>

                            <select  class="form-control input-sm help-block select" id="clasificacion">
                                <option>Editora</option>
                                <option>Animadora</option>
                                <option>Render</option>
                                <option>Play-Out</option>
                                <option>Server</option>
                                <option>laptop</option>
                            </select>
                        </div>

                    </div>

                                <div class="row col-md-12 col-lg-12">

                                    <div class="form-group  col-md-4  col-sm-4 col-xs-10">
                                        <label for="puntos"> Nombre de Equipo</label>

                                        <input type="text" class="form-control input-sm  help-block" id="nombre_cpu" name="nombre_cpu" required placeholder="Nombre de equipo">

                                    </div>

                                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                                        <label for="dept">Ubicacion</label>

                                        <select  class="form-control input-sm  help-block" id="ubicacion" name="ubicacion" style="width: 100%" required placeholder="depa">
                                            <?php cargaComboBox("select * from edificio","id_edificio","nombre_edificio") ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-4 col-sm-4 col-xs-10">
                                        <label for="puntos">Garantia</label>
                                        <input type="text" class="form-control input-sm  help-block" id="garantia" name="garantia" required placeholder="GARANTIA">

                                    </div>



                                </div>

                    <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos">RAM</label>
                            <div class="input-group">


                                <select class="form-control input-sm  help-block" id="ram">
                                    <?php cargaComboBoxram("SELECT * FROM `ram`","id_ram","capacidad","num_modulos", "voltage") ?>

                                </select>
                                <span class="input-group-btn">
                      <a  class="btn bg-navy btn-flat modalButton"  data-height=500 data-width=500 data-toggle="modal" data-target="#multiModal"  data-src="../ram/ram.php"  ><i class="fa fa-plus"></i></a>
                      <a  class="btn  btn-flat modalButton" data-height=500 data-width=500 data-toggle="modal" data-target="#multiModal"   data-src="../marca/buscar_Marca.php"><i class="fa fa-search"></i></a>
                    </span>
                            </div>
                        </div>

                        <div class="form-groupcol-md-6 col-sm-6 col-xs-10">
                            <label for="tvideo">Tarjeta de video </label>
                            <div class="input-group">

                                <select class="input-sm form-control help-block" id="tvideo" style="width: 100%">
                                    <?php cargaComboBox3("SELECT * FROM `tarj_video`","id_tvideo","marca","modelo", "memoria") ?>
                                </select>
                                <span class="input-group-btn">
                      <a  class="btn bg-navy btn-flat modalButton"  data-height=450 data-width=300 data-toggle="modal" data-target="#multiModal"  data-src="../tvideo/tvideo.php"  ><i class="fa fa-plus"></i></a>
                      <a  class="btn  btn-flat modalButton" data-height=500 data-width=500 data-toggle="modal" data-target="#multiModal"   data-src="../tvideo/ver_tvideo.php"><i class="fa fa-search"></i></a>
                    </span>
                            </div>
                        </div>

                    </div>



                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos">Estado</label>

                            <select class="form-control input-sm  help-block" id="estado">
                                <option>Operando</option>
                                <option>Desechado</option>
                                <option>Bodega</option>
                                <option>Prestamo</option>

                            </select>
                        </div>

                        <div class="form-group  col-md-6 col-sm-6 col-xs-10">
                            <label  for="marca">Marca</label>
                            <div class="input-group input-group-lg  input-lg select2-bootstrap-prepend">
						        <span class="input-group-btn ">
				<a  class="btn bg-navy btn-flat modalButton"  style="width: 9%"  data-height=350 data-width=320 data-toggle="modal" data-target="#multiModal"  data-src="../marca/marcas.php"  ><i class="fa fa-plus"></i></a>
						</span>

                                <select class=" select2 help-block" id="marca" name="marca" required style="width: 100%" placeholder="LICENCIA" >
                                    <?php cargaComboBox("SELECT * FROM marca","id_marca","nombre_marca") ?>
                                </select>
                            </div>
                        </div>
                                </div>


                            <div class="row col-md-12 col-lg-12">

                               <div class="form-group  col-md-6 col-sm-6 col-xs-10">
                                    <label class="fa fa-users" for="puntos">Responsables</label>
                                        <div class="input-group input-group-lg  input-sm select2-bootstrap-prepend">
                                            <span class="input-group-btn ">
					 <a  class="btn bg-navy btn-flat modalButton"  data-height=500 data-width=300 data-toggle="modal" data-target="#multiModal"  data-src="../empleados/empleados.php"  ><i class="fa fa-plus"></i></a>
						</span>
                                    <select class="js-example-basic-multiple select2  help-block"  id="empleados" name="empleados" required style="width: 100%" placeholder="EMPLEADOS" multiple="multiple">
                                        <?php cargaComboBox("SELECT * FROM `empleados`","id","nombre","apellido") ?>
                                    </select>
                               </div>
                                </div>

                        <div class="form-group  col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-unlock" for="licencia">Licencia</label>
                            <div class="input-group input-group-lg  input-sm select2-bootstrap-prepend">
						        <span class="input-group-btn ">
					 <a  class="btn bg-navy btn-flat modalButton"  data-height=500 data-width=520 data-toggle="modal" data-target="#multiModal"  data-src="../licencia/licencia.php"  ><i class="fa fa-plus"></i></a>
						</span>

                            <select class="js-example-basic-multiple select2 input-md help-block" id="licencia" name="licencia" required style="width: 100%" placeholder="LICENCIA" multiple="multiple">
                                <?php licencia("SELECT * FROM `vista_licencia`","id_licencia","nombre","fabricante", "cant_lic","usadas") ?>
                            </select>
                        </div>
                        </div>
                            </div>

                            <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-save control-label" for="discoD">Disco Duro</label>

                            <div class="input-group input-group-lg  input-sm select2-bootstrap-prepend">
						        <span class="input-group-btn ">
					 <a  class="btn bg-navy btn-flat modalButton"  data-height=500 data-width=400 data-toggle="modal" data-target="#multiModal"  data-src="../licencia/licencia.php"  ><i class="fa fa-plus"></i></a>
						</span>

                            <select class="js-example-basic-multiple select2 input-md help-block" id="discoD"  name="Disco_Duro"  required style="width: 100%" placeholder="Disco duro" multiple="multiple">
                                    <?php discoD("SELECT * FROM `disco_duro`","id_discoDuro","almacenamiento","cant_ray") ?>
                            </select>
                        </div>
                            </div>




                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label class="fa fa-desktop" for="monitor">Monitor</label>
                            <div class="input-group input-group-lg  input-sm select2-bootstrap-prepend">
						        <span class="input-group-btn ">
					 <a  class="btn bg-navy btn-flat modalButton"  data-height=500 data-width=400 data-toggle="modal" data-target="#multiModal"  data-src="../monitor/monitor.php"  ><i class="fa fa-plus"></i></a>
						</span>
                            <select  class="js-example-basic-multiple select2 input-md help-block" id="monitor" name="monitor" style="width: 100%" required placeholder="Monitor" multiple="multiple">
                                <?php cargaComboBox3("SELECT id_monitor, ma.nombre_marca, serie,inventario FROM monitor mo INNER JOIN marca ma ON mo.marca=ma.id_marca","id_monitor","nombre_marca","inventario", "serie") ?>
                            </select>
                        </div>

                        </div>

                            </div>
                    <div class="row col-md-12 col-lg-12">



                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <label for="Observaciones">Observaciones</label>
                            <textarea type="text" class="form-control  input-sm" id="observaciones" name="Observaciones" placeholder="Observaciones"></textarea>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="puntos"  class="control-label">IP del Equipo</label>
                            <div class="input-group input-group-lg  input-sm select2-bootstrap-prepend">
						        <span class="input-group-btn ">
					 <a  class="btn bg-navy btn-flat modalButton"  data-height=300 data-width=300 data-toggle="modal" data-target="#multiModal"  data-src="../ipv4/ipv4.php"  ><i class="fa fa-plus"></i></a>
						</span>

                            <select  class="js-example-basic-multiple select2 input-md help-block" id="ip" name="ip" style="width: 100%" required placeholder="Monitor" multiple="multiple">
                                <?php cargaComboBox("SELECT id_ip, ip FROM  ip_desocupadas","id_ip","id_ip","ip") ?>
                            </select>

                        </div>


                    </div>

                    </div>



                </div><!-- /.box-body -->



            </form>
        </div>
    </div>





    <script>

        $(document).ready(function(){

   $("#addbtn").click(function () {
       //alert("hola");
       var valor=$('#multiframe').contents().find('#valor').val();
       $("#modelo").val(valor);
       alert(valor);
   });
            $("#inventario").inputmask("99-999-9999");

            $("#empleados").select2();
            $("#discoD").select2();
            $("#monitor").select2();
            $("#licencia").select2();
            $("#dept").select2();
            $("#marca").select2();
             $("#empleados").val();
             $("#ip").select2();
             $("#select2-button-addons-multi-input-group-lg").select2();

            $('a.modalButton').on('click', function(e) {
                var src = $(this).attr('data-src');
                var height = $(this).attr('data-height') || 300;
                var width = $(this).attr('data-width') || 400;

                $("#multiModal iframe").attr({'src':src,
                    'height': height,
                    'width': width});
            });

            $('input[name="garantia"]').daterangepicker({
                timepicker:false,
                opens: "center",
                cancelClass: "btn-danger",
                locale:{
                    format:'YYYY/MM/DD'
                }
            });
            $("#ver tbody ").click(function(){

                var idx=$(this).attr('value');
                $( "p" ).append( "<strong>"+idx+"</strong>" );
                alert(idx);

            });

            $('input[name="fingreso"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                });

            $("#inventario").focusout(function() {
              this.value = (this.value + '').replace(/[^0-9]/g, '');
              verificaId($(this).val());

              var maxChars = 11;
              if ($(this).val().length > maxChars) {

                 toastr.error("Error","error al ingresar numero de inventario");
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
                    var num_inventario = $("#inventario").val();
                    verificaId(num_inventario);
                    var alldata = $("form").serializeArray();

                    var j=  JSON.stringify(alldata);

                    console.log(j);
                    var data=JSON.parse(j);
                    $( "#demo" ).empty();
                   console.log(data);
                   for(var i=0;i<data.length;i++){
                       console.log(data[i].value);
                       $( "#demo" ).append("<strong>"+data[i].name+" "+"</strong>",  data[i].value, "<br>" );
                   }
                });

        $("#guardar").click(function()
                 {
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


            if(num_inventario.trim()=='')
            {
                toastr.error("Hay campos que son obligatorios");
                return;
            }

            if(num_inventario.length!=11){
                toastr.error('Error',' inventario solo son 11 valores');

                return;

            }
                     verificaId(num_inventario);

            $.ajax({
                type:"POST",
                url:"consultas_cpu.php",
                data:
                    {
                        tarea:"guardar",
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
                    if(data=="Error"){

                    toast.error('error', 'ingrese num identidad');
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
                            toastr.error("ERROR", "Este numero de inventario ya existe");

                            $("#div_inventario").removeClass("has-success");
                            $("#div_inventario").addClass("has-error");
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
        function limpiarcampos(){ document.getElementById("identidad").value=""; }
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
function discoD($consul,$id,$nombre, $raid)
{
    include('../config/conexion2.php');

    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row["$id"]."'>";
        echo "Capac ".$row["$nombre"]."- Raid ".$row[$raid];
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
function cargaComboBoxram($consul,$id,$nombre, $apellido, $inp)
{
    include('../config/conexion.php');
    $resul=mysqli_query($mysqli,$consul);
    while ($row=mysqli_fetch_array($resul))
    {
        echo "<option value='".$row[$id]."'>";
        echo "Capacidad ".$row[$nombre]." -Modulos  ".$row[$apellido]." -Voltage ".$row[$inp];
        echo "</option>";

    }
}

?>
</html>