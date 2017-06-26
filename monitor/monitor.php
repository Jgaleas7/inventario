<?php include('../config/conexion2.php'); ?>
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
               MONITOR
               <small>Añadir Monitor</small>
           </h1>
           <ol class="breadcrumb">
               <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a >Monitor</a></li>
               <li class="active">Añadir Monitor</li>
           </ol>
       </section>
           <div class="col-md-12" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir Monitor</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">

                     <div class="row col-md-12 col-lg-12">
                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                         <label for="inventario"> Numero Inventario*</label>
                         <input type="text" class="form-control  input-sm  help-block" id="inventario" name="inventario" placeholder="Serie del monitor">
                     </div>

                   <div class="form-group col-md-6 col-sm-6 col-xs-12">
                      <label for="marca">Marca</label>
                       <select class="help-block" id="marca" name="marca" required style="width: 95%" placeholder="marca">
                           <?php ComboBoxMarca("SELECT * FROM `marca`","id_marca","nombre_marca"); ?>
                       </select>
                    </div>
                     </div>

                     <div class="row col-md-12 col-lg-12">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                      <label for="serie"> Serie</label>
                      <input type="text" class="form-control  input-sm  help-block" id="serie" name="serie" placeholder="Serie del monitor">
                    </div>

                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                      <label for="serv"> Service Tag/Modelo</label>
                      <input type="text" class="form-control  input-sm  help-block" id="serv" name="serv" placeholder="Service Tag">
                     </div>
                     </div>

                     <div class="row col-md-12 col-lg-12">
                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                      <label for="nombre"> Tamaño</label>
                      <input type="text" class="form-control  input-sm  help-block" id="tamano" name="tamano" placeholder="Tamaño del monitor">
                    </div>

                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                      <label for="tipo"> Tipo de monitor</label>
                         <select id="tipo" class="form-control  input-sm  help-block">
                             <option value="LCD">LCD</option>
                             <option value="HD">LED</option>
                         </select>
                    </div>
                     </div>
                     <div class="row col-md-12 col-lg-12">
                     <div class="form-group col-md-6 col-sm-6 col-xs-10">
                         <label class="fa fa-laptop" for="monitor">CPU</label>
                             <select  class="form-control help-block" id="cpu" name="cpu" style="width: 100%" required placeholder="Monitor" multiple="multiple">
                                 <?php cargaComboBox("SELECT num_inventario, nombre_cpu, modelo FROM cpu","num_inventario","nombre_cpu", "num_inventario") ?>
                             </select>

                     </div>
                         <div class="form-group col-md-6 col-sm-6 col-xs-10">
                             <label for="fecha_compra">fecha Compra</label>
                             <input type="text" class="form-control input-sm" id="fecha_compra" name="fecha_compra" placeholder="Fecha de compra">
                         </div>


                     </div>
                     <div class="form-group col-md-6 col-sm-6 col-xs-10">
                         <label for="obs"> Observacion</label>
                         <textarea class="form-control input-group-sm" id="obs" name="obs" placeholder="Ejemplo Buen estado..."></textarea>
                     </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                      <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg btn-flat">   <span class="fa fa-list"></span>
                          Ver Monitores</a>

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
                        $('#fecha_compra').datepicker({
                            clearBtn: true,
                            language: "es"
                        });

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
    var fecha_compra= $("#fecha_compra").val();

            if(inventario.indexOf('_') != -1) {toastr.error("Numero de Inventario no valido"); return; }
  if(inventario.trim()=='')
            {toastr.error("Hay campos que son obligatorios");  return;  }
            if(marca.trim()=='0')
            {toastr.error("hay problema con la marca");  return;  }
            
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"guardar",
                    marca:marca,
                    inventario:inventario,
                    tipo:tipo,
                    serie:serie,
                    service:service,
                    obs:obs,
                    tamano:tamano,
                    cpu:cpu,
                    fecha_compra:fecha_compra
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
                            toastr.error('Error','Ya Existe ese inventario');

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
function ComboBoxMarca($consul,$id,$nombre, $apellido)
{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row["$id"]."'>";
        echo $row["$nombre"];
        echo "</option>";
    }
}
?>

</html>