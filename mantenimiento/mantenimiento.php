<?php
/**
 * Created by PhpStorm.
 * User: ENLMovil1
 * Date: 6/6/2017
 * Time: 2:21 PM
 */
 include('../config/conexion2.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitor</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet">


</head>

<body class="login-page">



<div id="cuerpo" class="col-md-12" >
    <section class="content-header">
        <h1>
            MANTENIMIENTO
            <small>Añadir Mantenimiento</small>
        </h1>
        <ol class="breadcrumb">
            <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a >Mantenimiento</a></li>
            <li class="active">Añadir Mantenimiento</li>
        </ol>
    </section>
    <div class="col-md-12" >
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Añadir Mantenimiento</h2>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">

                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label for="tipo_equipo">Tipo Equipo</label>
                            <select class="help-block" id="tipo_equipo" name="tipo_equipo"  style="width: 95%">
                                <option value="0">--</option>
                                <option value="cpu">CPU</option>
                                <option value="monitor">Monitor</option>
                                <option value="liveu">Live U</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label for="id_equipo">Inventario</label>
                            <select  id="id_equipo" style="width: 100%"></select>
                        </div>
                    </div>

                    <div class="row col-md-12 col-lg-12">
                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="fecha">fecha </label>
                            <input type="text" class="form-control input-sm help-block" id="fecha" name="fecha" placeholder="fecha">
                        </div>



                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label for="precio">Costo</label>
                            <input type="text" class="form-control input-sm help-block" id="precio" name="precio" placeholder="Costo del mantenimiento">
                        </div>


                    </div> <div class="row col-md-12 col-lg-12">
                        <div class="form-group col-md-6 col-sm-6 col-xs-10">
                            <label for="ubicacion">Ubicacion </label>
                            <input type="text" class="form-control input-sm" id="ubicacion" name="ubicacion" placeholder="Ubicacion">
                        </div>



                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label for="estado"> Estado</label>
                            <select  id="estado" style="width: 100%">
                                <option value="Entregado">Entregado</option>
                                <option value="Reparacion">En Reparacion</option>
                            </select>
                            </div>


                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-10">
                        <label for="obs"> Observacion</label>
                        <textarea class="form-control input-group-sm" id="obs" name="obs" placeholder="Descripcion del trabajo..."></textarea>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                    <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg btn-flat">   <span class="fa fa-list"></span>
                        Ver Mantenimientos</a>

                </div>
            </form>
            <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
            <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
            <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
            <script type="text/javascript" src="../js/toastr.js"></script>
            <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
            <script src="../dist/js/app.min.js" type="text/javascript"></script>
            <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
            <script>
                $(document).ready(function () {
                    $("#inventario").inputmask("99-999-9999");
                    $("select").select2();
                    $('#fecha').datepicker({
                        clearBtn: true,
                        language: "es"
                    });

                });
                $("#tipo_equipo").on("change", function () {
                    var valor=this.value;
                    var getData="consultas.php?combo="+valor;
                    $("#id_equipo").load(getData);
                });

                $("#guardar").click(function()
                {
                    var id_equipo= $("#id_equipo").val();
                    var tipo_equipo = $("#tipo_equipo").val();
                    var obs= $("#obs").val();
                    var fecha= $("#fecha").val();
                    var precio= $("#precio").val();
                    var ubicacion= $("#ubicacion").val();
                    var estado= $("#estado").val();

                    if(tipo_equipo.trim()=='0')
                    {
                        toastr.error("ERROR","Tipo de Equipo no es valido");
                        return;
                    }

                    $.ajax({
                        type:"POST",
                        url:"consultas.php",
                        data:
                            {
                                tarea:"guardar",
                                id_equipo:id_equipo,
                                tipo_equipo:tipo_equipo,
                                obs:obs,
                                fecha:fecha,
                                precio:precio,
                                ubicacion:ubicacion,
                                estado:estado

                            },
                        success: function(data)
                        {
                            data=data.split("|");
                            $.each(data, function(i, item) {

                                if (item=="bien"){

                                    toastr.success('Exito','se ha Guardado correctamnete');
                                    limpiarcampos();
                                }
                                if (item=="mal"){
                                    toastr.error('Error','Ha ocurrido un error');

                                }

                            });
                        },
                        error: function(xhr, ajaxOptions, thrownError)
                        {
                            alert(thrownError);
                            alert("No funciona ajax para guardar");
                        }
                    })


                });

                function limpiarcampos(){
                    document.getElementById("fecha").value="";
                    document.getElementById("precio").value="";
                    document.getElementById("ubicacion").value="";
                    document.getElementById("obs").value="";
                }
                function goBack(){
                    setTimeout(function(){  window.location.href="ver_mantenimientos.php";  }, 30);
                }

            </script>


        </div>
    </div>
</div>


</body>


</html>