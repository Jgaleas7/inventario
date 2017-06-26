<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live U</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../plugins/jQuery/jquery-3.1.1.js" type="text/javascript"></script>
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet">
</head>
<body class="login-page">

<div class="modal fade" id="multiModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div id="demo" class="modal-body">
                <iframe id="multiframe" height="500" width="530" src="../simcard/buscar_simcard.php"  frameborder="0" ></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addbtn" data-dismiss="modal" class="btn btn-flat btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>

   
   <div id="cuerpo" class="col-md-12" >
       <section class="content-header">
           <h1>
               LiveU
               <small>Añadir LiveU</small>
           </h1>
           <ol class="breadcrumb">
               <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a >CPU</a></li>
               <li class="active">Añadir LiveU</li>
           </ol>
       </section>
           <div class="col-md-12" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir Live U</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  <div class="row col-md-12 col-xs-12 col-lg-12">
                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="nombre">Nombre Live U*</label>
                          <input type="text" class="form-control input-sm help-block" id="nombre" name="nombre" placeholder="Nombre del LIVE U">
                      </div>

                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="inventario">Numero Inventario</label>
                          <input type="text" class="form-control input-sm  help-block" id="inventario"  placeholder="Numero de Inventario">
                      </div>
                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="modelo">Modelo</label>
                          <input type="text" class="form-control input-sm  help-block" id="modelo"  placeholder="Modelo">
                      </div>
                  </div>

                     <div class="row col-md-12 col-xs-12 col-lg-12">


                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="serie">Serie</label>
                          <input type="text" class="form-control input-sm  help-block" id="serie" placeholder="Serie">
                      </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="tipo">Tipo</label>
                             <select id="tipo" class="form-control input-sm  help-block">
                                 <option value="mochila">Mochila</option>
                                 <option value="extender">Extender</option>
                                 <option value="smartgrip">Smart Grip</option>
                                 <option value="liveu">Live U</option>
                                 <option value="smartphone">Smart Phone</option>
                             </select>
                         </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="asignado">Asignado A</label>
                             <select id="asignado" class="form-control input-sm  help-block">

                                 <option value="noticierocnt">Noticiero CNT</option>
                                 <option value="noticierosps">Noticiero SPS</option>
                                 <option value="noticierolcb">Noticiero LCB</option>
                             </select>
                         </div>
                  </div>

                        <div class="row col-md-12 col-xs-12 col-lg-12">
                            <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                                <label for="verion">Versión de Software</label>
                                <input type="text" class="form-control input-sm  help-block" id="version" placeholder="Versiòn del software">
                            </div>


                            <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                                <label for="moden">Cantidad de Moden</label>
                                <input type="number" class="form-control  input-sm help-block" id="cantidad" placeholder="Cantidad de Moden">
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-xs-12  ">
                                <label for="fecha_compra">Fecha de Compra</label>
                                <input type="text" class="form-control input-sm  help-block " id="fecha_compra" placeholder="Fecha Compra">

                            </div>
                        </div>

                        <div class="row col-md-12 col-xs-12 col-lg-12">
<!--
                            <div class="form-group col-md-4 col-sm-6 col-xs-12 ">
                                <label for="asociado">Asociado A</label>
                                <input type="text" class="form-control input-sm  help-block" id="asociado" name="page" placeholder="Asociado A">
                            </div>-->
                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                <label for="descripcion">Descripcion</label>
                                <textarea  class="form-control input-sm " id="descripcion" placeholder="Descripcion"></textarea>
                            </div>
                        </div>
    <a id="openmodal" data-toggle="modal" data-target="#multiModal"  class="btn btn-flat btn-success fa fa-search"> Listar Sim</a>
<hr>
                     <table id="sim" class="display table " >
                         <thead>
                         <tr>
                             <th data-field="id">id</th>
                             <th data-field="Nombre">IMEI</th>
                             <th data-field="Numero">Numero</th>
                             <th data-field="Compañia">Compañia</th>
                             <th data-field="Accion">Accion</th>
                         </tr>
                         </thead>
                         <tbody>

                         </tbody>
                     </table>

                     <hr>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat btn-primary btn-lg">Guardar</button>
                      <a  onclick="goBack()" class="btn btn-flat bg-navy btn-flat btn-lg">   <span class="glyphicon glyphicon-list"></span>
                          Ver Live U</a>
                  </div>


                </form>

                  <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
                  <script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>
                  <script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>
                  <script type="text/javascript" src="../js/bootbox.min.js" ></script>
                  <script type="text/javascript" src="../js/toastr.js" ></script>
                  <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
                  <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
                <script>
                    $(document).ready(function () {
                        $('#fecha_compra').datepicker({
                            clearBtn: true,
                            language: "es"
                        });
                    });

                    $("#addbtn").click(function () {
                        var valor=$('#multiframe').contents().find('#valor').val();

                        if(valor.trim()==''){
                            return;
                        }

                      var valoresTabla =valor.split(",");

                        var table = $('#sim').DataTable(); //example es la tabla de ventas en este archivos
                        var rowNode = table .row.add( [valoresTabla[0], valoresTabla[1],valoresTabla[2],valoresTabla[3], "<a  class='btn btn-flat btn-sm btn-danger fa fa-trash-o'> Eliminar</a>"] ) //le mando los parametros a la tabla de ventas
                            .draw()
                            .node();

                    });

                    $("#cantidad").keyup(function() {
                        this.value = (this.value + '').replace(/[^0-9]/g, '');

                    });
                    $("#cantidad").focusout(function() {
                        this.value = (this.value + '').replace(/[^0-9]/g, '');

                    });

                   $(document).ready(function () {
                       $('#sim').DataTable({
                           "aoColumnDefs": [
                               { "bVisible": false, "aTargets": [ 0 ] }
                           ],
                           "paging":   false,
                           "ordering": false,
                           "info":     false
                       });
                       $("#inventario").inputmask("99-999-9999");
                   });
 $("#openmodal").click(function () {
     $('#myModal').modal('show');

 });


$("#sim tbody").on('click', '.btn-danger', function () {

    var tablesim=$("#sim").DataTable();
    var borrar = confirm("Desea eliminar este SIM");

    if (borrar==true){
        tablesim.row($(this).parents('tr')).remove().draw( false );
        console.log(borrar);
    }

});

 $("#guardar").click(function()
        {
    var nombre = $("#nombre").val();
    var inventario= $("#inventario").val();
    var modelo= $("#modelo").val();
    var serie= $("#serie").val();
    var asiganado1= $("#asignado").val();
    var tipo= $("#tipo").val();

    var version= $("#version").val();
    var modem= $("#cantidad").val();
    var fecha_compra= $("#fecha_compra").val();
    var descripcion= $("#descripcion").val();

    var table = $('#sim').DataTable();
    var data = table.column( 0 ).data();
    var sim= data.toArray();
            console.log(sim);
            if(inventario.indexOf('_') != -1) {toastr.error("Numero de Inventario no valido"); return; }
  if( nombre.trim()=='')
            {
               toastr.error("Hay campos que son obligatorios");
                return;
            }
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"guardar",
                    nombre:nombre,
                    inventario:inventario,
                    modelo:modelo,
                    serie:serie,
                    tipo:tipo,
                    asignado:asiganado1,
                    version:version,
                    modem:modem,
                    fecha_compra:fecha_compra,
                    descri:descripcion,
                    sim:sim
                },
                success: function(data)
                {
                    data=data.split("|");
                    $.each(data, function(i, item) {

                        if (item=="bien"){

                            toastr.success('Exito','se ha Guardado correctamnete');
                            limpiarcampos();
                            goBack();
                        }
                        if (item=="mal"){
                            toastr.error('Error','Vuela intentar');

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

        document.getElementById("fecha_compra").value="";
        document.getElementById("descripcion").value="";

    }

			function goBack(){
                        setTimeout(function(){  window.location.href="ver_liveu.php";  }, 30);
             
                  }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>
</html>