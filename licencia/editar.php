<?php 
include_once '../config/conexion2.php';

$id=$_GET['id'];
$mbd=DB::connect();DB::disconnect();
         $proof=$mbd->query("SELECT * from licencia WHERE id_licencia='$id'");
      foreach($proof as $row){
		 $id_lic= $row["id_licencia"];
		  $row["nombre"];
		  $row["idioma"];
		  $row["descripcion"];
		  $row["fecha_vence"];
		  $row["fabricante"];
		  $row["clave"];
		  $row["usuario_lic"];
		  $row["pass"];
		  $row["cant_lic"];
		  $row["pag_web"];
		  $row["tipo_contrato"];
	  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Licencia</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet">

</head>
<body class="login-page">



    <div id="cuerpo" class="col-md-12" >

        <section class="content-header">
            <h1>
                Licencia
                <small>Editar Licencia</small>
            </h1>
            <ol class="breadcrumb">
                <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a >Licencia</a></li>
                <li class="active">Editar Licencia</li>
            </ol>
        </section>

        <div class="col-md-12" >
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Editar Licencia</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <input type="hidden" id="id"  value="<?php if (isset($row["id_licencia"])) echo $row["id_licencia"];?>">
                        <div class="row col-md-10 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="nombre">Nombre Licencia*</label>
                                <input type="text" class="form-control input-sm help-block" id="nombre" value="<?php if (isset($row["nombre"])) echo $row["nombre"];?>" name="nombre" placeholder="Nombre de la Licencia">
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="fabricante">Fabricante</label>
                                <input type="text" class="form-control input-sm  help-block" id="fabricante" value="<?php if (isset($row["fabricante"])) echo $row["fabricante"];?>" name="fabricante" placeholder="Nombre del Fabricante">
                            </div>
                        </div>

                        <div class="row col-md-10 col-lg-12">

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="usuario">Credenciales de acceso web</label>
                                <input type="text" class="form-control input-sm  help-block" id="usuario" value="<?php if (isset($row["usuario_lic"])) echo $row["usuario_lic"];?>" name="usuario" placeholder="Usuario de la licencia">
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="pass">Contraseña de acceso web</label>
                                <input type="text" class="form-control input-sm  help-block" id="pass" value="<?php if (isset($row["pass"])) echo $row["pass"];?>" name="pass" placeholder="password de la licencia">
                            </div>

                        </div>



                        <div class="row col-md-10 col-lg-12">

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="pag_web">Pagina Web de la Licencia</label>
                                <input type="text" class="form-control input-sm  help-block" id="pag_web"value="<?php if (isset($row["pag_web"])) echo $row["pag_web"];?>" name="page" placeholder="Pagina web www.videocopilot.com">
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="tipo_contrato">Tipo de Contrato</label>
                                <select id="tipo_contrato" class="form-control input-sm  help-block">

                                    <option <?php if (isset($row["tipo_contrato"]) && $row["tipo_contrato"]=="vigencia") echo "selected";?> value="vigencia">Vigencia</option>
                                    <option <?php if (isset($row["tipo_contrato"]) && $row["tipo_contrato"]=="indefinido") echo "selected";?> value="indefinido">Indefinido</option>
                                </select>
                            </div>

                        </div>


                        <div class="row col-md-10 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="clave">Clave(Key)</label>
                                <input type="text" class="form-control input-sm  help-block" id="clave" value="<?php if (isset($row["clave"])) echo $row["clave"];?>" name="clave" placeholder="Clave de licencia">
                            </div>


                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="cantidad">Cantidad de Licencias*</label>
                                <input type="number" class="form-control  input-sm help-block" id="cantidad" value="<?php if (isset($row["cant_lic"])) echo $row["cant_lic"];?>" name="cant" placeholder="Cantidad de licencias">
                            </div>


                        </div>

                        <div class="row col-md-10 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12  ">
                                <label for="fecha_vence">Fecha de Vencimiento</label>
                                <input type="text" class="form-control input-sm  help-block " id="fecha_vence" <?php if (isset($row["tipo_contrato"]) && $row["tipo_contrato"]=="indefinido"){echo "disabled "; echo "value=\""." "."\" ";}else{ echo "value=\"".$row["fecha_vence"]."\" ";}  ;?> name="fecha_vence"  placeholder="Fecha de verncimiento de la licencia">

                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="idioma">Idioma</label>
                                <select id="idioma" class="form-control input-sm  help-block">
                                    <option <?php if (isset($row["idioma"]) && $row["idioma"]=="espanol") echo "selected";?> value="espanol">Español</option>
                                    <option <?php if (isset($row["idioma"]) && $row["idioma"]=="ingles") echo "selected";?> value="ingles">Ingles</option>

                                </select>
                            </div>

                        </div>
                        <div class="row col-md-10 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="users">Usuarios de Licencia</label>
                                <select id="users" class="form-control input-sm  help-block" multiple="multiple">
                                    <?php
                                    $mbd=DB::connect();DB::disconnect();
                                    $proof5=$mbd->query("SELECT id_empleado, e.nombre, e.apellido FROM `detalle_users_licencia` 
                                            INNER JOIN empleados e ON id_empleado=e.id WHERE id_licencia='$id_lic'");

                                    while($row5 = $row5 = $proof5->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option selected value=" . $row5["id_empleado"] . ">" . $row5["nombre"] . " " . $row5["apellido"] . "</option>";
                                    }
                                    cargaComboBox("SELECT  e.nombre, e.apellido, e.id FROM empleados e
                                           WHERE   e.id NOT IN  (  SELECT id_empleado 
                                           FROM detalle_users_licencia  WHERE id_licencia ='$id_lic' )","id","nombre","apellido");

                                    ?>
                                </select>
                            </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label for="descripcion">Descripcion</label>
                            <textarea  class="form-control input-sm " id="descripcion" name="descripcion" placeholder="Descripcion de la Licencia"><?php if (isset($row["descripcion"])) echo $row["descripcion"];?></textarea>
                        </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" id="guardar" class="btn  btn-flat btn-primary btn-lg">Guardar</button>
                        <a  onclick="goBack()" class="btn bg-navy btn-lg btn-flat">   <span class="glyphicon glyphicon-list"></span>
                            Ver licencias</a>

                    </div>
                </form>
                <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
                <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="../plugins/select2/select2.min.js"></script>
                <script type="text/javascript" src="../js/toastr.js"></script>
                <script type="text/javascript" src="../plugins/datepicker/bootstrap-datepicker.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#fecha_vence').datepicker({
                            clearBtn: true,
                            language: "es"
                        });
                        $("#users").select2();
                    });
                    $("#cantidad").keyup(function() {
                        this.value = (this.value + '').replace(/[^0-9]/g, '');
                    });
                    $("#cantidad").focusout(function() {
                        this.value = (this.value + '').replace(/[^0-9]/g, '');

                    });

                    $("#tipo_contrato").change(function() {

                        if (this.value=="indefinido"){

                            $("#fecha_vence").prop( "disabled", true );
                            $("#fecha_vence").val("");
                        }if (this.value=="vigencia"){

                            $("#fecha_vence").prop( "disabled", false );
                        }

                    });

                    $("#guardar").click(function()
                    {
                        var id = $("#id").val();
                        var nombre = $("#nombre").val();
                        var idioma= $("#idioma").val();
                        var descripcion= $("#descripcion").val();
                        var fecha_vence= $("#fecha_vence").val();

                        var clave= $("#clave").val();
                        var fabricante= $("#fabricante").val();
                        var usuario= $("#usuario").val();
                        var pass= $("#pass").val();
                        var cantidad= $("#cantidad").val();
                        var pag_web= $("#pag_web").val();
                        var tipo_contrato= $("#tipo_contrato").val();
                        var users=$("#users").val();

                        if( nombre.trim()=='')
                        {
                            toastr.error("Hay campos que son obligatorios");
                            return;
                        }
                        if (cantidad.trim()=='' || cantidad<=0){
                            toastr.error("La cantidad de Licencias debe ser mayor a CERO");
                            return;
                        }


                        $.ajax({
                            type:"POST",
                            url:"consultas.php",
                            data:
                                {
                                    tarea:"editar",
                                    id:id,
                                    nombre:nombre,
                                    idioma:idioma,
                                    descripcion:descripcion,
                                    fecha_vence:fecha_vence,
                                    clave:clave,
                                    fabricante:fabricante,
                                    usuario:usuario,
                                    pass:pass,
                                    cant_lic:cantidad,
                                    pag_web:pag_web,
                                    tipo_contrato:tipo_contrato,
                                    users:users

                                },
                            success: function(data)
                            {
                                console.log(data);
                                data=data.split("|");
                                $.each(data, function(i, item) {

                                    if (item=="bien"){

                                        toastr.success('Exito','se ha Guardado correctamnete');
                                        limpiarcampos();
                                        goBack();
                                    }
                                    if (item=="mal"){
                                        toastr.error('Error','Ha ocurrido un error vuelva intentarlo');

                                    }

                                });

                            },
                            error: function(xhr, ajaxOptions, thrownError)
                            {
                                toastr.error(thrownError);
                                toastr.error("No funciona ajax para guardar");
                            }
                        })


                    });

                    function limpiarcampos(){
                        document.getElementById("nombre").value="";
                        document.getElementById("fabricante").value="";
                        document.getElementById("clave").value="";
                        document.getElementById("fecha_vence").value="";
                        document.getElementById("descripcion").value="";

                    }
                    function goBack(){
                        setTimeout(function(){  window.location.href="ver_licencias.php";  }, 300);
                    }

                </script>


            </div>
        </div>
    </div>


</body>
<?php

function cargaComboBox($consul, $id, $nombre, $apellido)
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

?>

</html>