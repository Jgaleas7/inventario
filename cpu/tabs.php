<?php
/**
 * Created by PhpStorm.
 * User: ENLMovil1
 * Date: 11/1/2017
 * Time: 10:53 AM
 */
$server  = $_SERVER['DOCUMENT_ROOT'];
//include($server."/config/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear CPU</title>
    <?php // include(VISTA_RUTA."admininclude/head.php") ?>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">

    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker-master/daterangepicker.css" />

    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">

    <div id="page-wrapper">
        <!-- INICIO CONTENIDO -->
        <!-- TAB NAVIGATION -->
        <div class="row">
            <div class="col-lg-12" style="background: blue; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(left top, lightblue, lightblue); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(bottom right, lightblue, lightgray); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, lightgray, blue); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, lightblue, lightgray); /*">
                <h3><strong><b>Crear </b></strong><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Equipo</h3>
                <div class="row col-lg-offset-8 ">
                <button type="button" id="guardar" class="btn  btn-primary btn-lg col-lg-offset-1 glyphicon glyphicon-floppy-saved">Guardar</button>
                <button type="button" id="guardar" class="btn  btn-danger btn-lg col-lg-offset-1 glyphicon glyphicon-trash">Eliminar</button>
                <button type="button" id="guardar" class="btn  btn-primary btn-lg col-lg-offset-1 glyphicon glyphicon-repeat">Modificar</button>
            </div>
        </div>
        <ul class="nav nav-tabs "  role="tablist">
            <li class="active"><a href="#tab1" role="tab" data-toggle="tab">General <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
            <li><a href="#tab2" role="tab" data-toggle="tab" onclick="ocultarTabla()">Especificaciones <span class="glyphicon glyphicon-signal" aria-hidden="true"></a></li>
            <li><a href="#tab3" role="tab" data-toggle="tab">Ayuda  <i class="fa fa-question-circle fa-fw" aria-hidden="true"></i> </a></li>
        </ul>
        <!-- TAB CONTENT -->
        <div class="tab-content">
            <div class="active tab-pane fade in" id="tab1">
                <br>
                <div class="col-md-8 col-md-offset-3" >
                <form action="" method="post" role="form">
                    <h1>Crear Equipo CPU</h1>
                    <div class="row" style="margin-top: 1%">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Numero de Inventario</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="numero de inventario" min="9" required>
                        </div><!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label for="fecha">Marca</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Marca del equipo" required>
                        </div><!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label for="fecha">Serie</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Serie">
                        </div><!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label for="fecha">Service Tag</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="SERVICE TAG..">
                        </div><!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label for="fecha">Garantia</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="rango" name="rango" PLACEHOLDER="Garantia">
                        </div><!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label for="descripcion_trabajo">Observaciones</label>
                        <textarea type="text" class="form-control input-lg" id="descripcion_trabajo" name="descripcion_trabajo" placeholder="detalle del equipo..."></textarea>
                    </div>

                </form>
                </div>
            </div>

            <div class="tab-pane fade" id="tab2">
                <div class="row">
                    <div class="col-md-8 col-md-offset-3" ><br>



                        <div class="form-group">
                            <label for="fecha">RAM</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="RAM">
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Licencia</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Licencia">
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Tarjeta de video</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Tarjeta de Video">
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Departamento</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Departamneto" required>
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Edificio</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Edificio" required>
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Empleado</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Empleado">
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Disco Duro</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fecha" PLACEHOLDER="Disco Duro">
                            </div><!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha de Ingreso</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="fecha" name="fechaIngreso" PLACEHOLDER="Fecha de Ingreso">
                            </div><!-- /.input group -->
                        </div>
                        <label>Estado</label>
                        <select class="form-control input-lg" id="lugar" name="lugar" >
                            <option>Disponible</option>
                            <option>Desechado</option>
                            <option>Operando</option>


                        </select>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab3">
                <h1>Hola </h1>
            </div>
        </div>
    </div>
    <!--TERMINO CONTENIDO -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php //include(VISTA_RUTA."admininclude/scripts.php") ?>

<script>

    $( document ).ready(function() {

        $('input[name="rango"]').daterangepicker({
            timepicker:false,
            locale:{
                format:'YYYY/MM/DD'
            }
        });



    });
    //funcion para ocultar elementos
    function mostrarTabla() {
        document.getElementById("tabla").style.display = 'block';
        //funcion para Mostrar elementos ocultos
    }function ocultarTabla() {
        document.getElementById("tabla").style.display = 'none';
    }

    //function para generar la tabla de datos
    function generarTabla() {
        //alert('click');
        $.ajax({
            type:"POST",
            dataType: "json",
            url: "<?php //url('ventas/datos')?>",
            data: {
                tops: $('#tops').val()
            },
            success: function (data) {
                alert(data);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    }
</script>
</body>
</html>