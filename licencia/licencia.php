<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Licencia</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link href="../js/bootstrap-daterangepicker-master/daterangepicker.css" rel="stylesheet">
</head>
<body class="login-page">

   
   <div id="cuerpo" class="col-md-12" >
       <section class="content-header">
           <h1>
               Licencia
               <small>Añadir Licencia</small>
           </h1>
           <ol class="breadcrumb">
               <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a >Licencia</a></li>
               <li class="active">Añadir Licencia</li>
           </ol>
       </section>

           <div class="col-md-12" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir Licencia</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  <div class="row col-md-10 col-lg-12">
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                          <label for="nombre">Nombre Licencia*</label>
                          <input type="text" class="form-control input-sm help-block" id="nombre" name="nombre" placeholder="Nombre de la Licencia">
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="fabricante">Fabricante</label>
                          <input type="text" class="form-control input-sm  help-block" id="fabricante" name="fabricante" placeholder="Nombre del Fabricante">
                      </div>
                  </div>

                            <div class="row col-md-10 col-lg-12">

                                <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                    <label for="usuario">Credenciales de acceso web</label>
                                    <input type="text" class="form-control input-sm  help-block" id="usuario" name="usuario" placeholder="Usuario de la licencia">
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                    <label for="pass">Contraseña de acceso web</label>
                                    <input type="text" class="form-control input-sm  help-block" id="pass" name="pass" placeholder="password de la licencia">
                                </div>

                            </div>



                    <div class="row col-md-10 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="pag_web">Pagina Web de la Licencia</label>
                            <input type="text" class="form-control input-sm  help-block" id="pag_web" name="page" placeholder="Pagina web www.videocopilot.com">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="tipo_contrato">Tipo de Contrato</label>
                            <select id="tipo_contrato" class="form-control input-sm  help-block">

                                <option value="vigencia">Vigencia</option>
                                <option value="indefinido">Indefinido</option>
                            </select>
                        </div>


                    </div>


                        <div class="row col-md-10 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="clave">Clave</label>
                                <input type="text" class="form-control input-sm  help-block" id="clave" name="clave" placeholder="Clave de licencia">
                            </div>


                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="cantidad">Cantidad de Licencias*</label>
                                <input type="number" class="form-control  input-sm help-block" id="cantidad" name="cant" placeholder="Cantidad de licencias">
                            </div>


                        </div>

                        <div class="row col-md-10 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12  ">
                                <label for="fecha_vence">Fecha de Vencimiento</label>
                                    <input type="text" class="form-control input-sm  help-block " id="fecha_vence" name="fecha_vence"  placeholder="Fecha de verncimiento de la licencia">

                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="idioma">Idioma</label>
                                <select id="idioma" class="form-control input-sm  help-block">
                                    <option value="espanol">Español</option>
                                    <option value="ingles">Ingles</option>

                                </select>
                            </div>

                        </div>
                     <div class="row col-md-10 col-lg-12">
                         <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                             <label for="users">Usuarios de Licencia</label>
                             <select id="users" class="form-control input-sm  help-block" multiple="multiple">
                             <?php cargaComboBox("SELECT * FROM `empleados`","id","nombre","apellido") ?>

                             </select>
                         </div>

                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <label for="descripcion">Descripcion</label>
                         <textarea  class="form-control input-sm " id="descripcion" name="descripcion" placeholder="Descripcion de la Licencia"></textarea>
                     </div>


                     </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat btn-primary btn-lg">Guardar</button>
                      <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg btn-flat">   <span class="glyphicon glyphicon-list"></span>
                          Ver licencias</a>

                  </div>
                </form>
                  <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
                  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
                  <script type="text/javascript" src="../plugins/select2/select2.min.js"></script>
                  <script  src="../js/bootstrap-daterangepicker-master/moment.min.js"></script>
                  <script type="text/javascript" src="../js/bootstrap-daterangepicker-master/daterangepicker.js"></script>
                  <script type="text/javascript" src="../js/toastr.js"></script>


                <script>
                    $(document).ready(function () {
                        $("#fecha_vence").daterangepicker({

                            locale: {
                                format: 'DD-MM-YYYY',
                            },
                            singleDatePicker: true,
                            showDropdowns: true
                        });
                        toastr.options.newestOnTop = false;
                        toastr.options.progressBar = true;
                        $("select").select2();


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
    var users= $("#users").val();

    
     
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
                    tarea:"guardar",
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
                    data=data.split("|");
                    $.each(data, function(i, item) {

                        if (item=="bien"){

                            toastr.success('Exito','se ha Guardado correctamnete');
                            limpiarcampos();
                        }
                        if (item=="mal"){
                            toastr.error('Error','Ha ocurrido un error vuelva intentarlo');

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
        document.getElementById("nombre").value="";
        document.getElementById("fabricante").value="";
        document.getElementById("clave").value="";
        document.getElementById("fecha_vence").value="";
        document.getElementById("descripcion").value="";

    }
							         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_licencias.php";  }, 30);
             
         }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>
<?php
function cargaComboBox($consul, $id, $nombre, $apellido)
{
    include('../config/conexion2.php');

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