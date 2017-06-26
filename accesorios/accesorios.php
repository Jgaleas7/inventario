<?php     include('../config/conexion2.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accesorios</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../css/toastr.css">
     <link rel="stylesheet" href="../js/node_modules/custombox/dist/custombox.min.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="login-page">


   
   <div id="cuerpo" class="col-md-12" >
       <section class="content-header">
           <h1>
               Accesorios
               <small>Añadir Accesorios</small>
           </h1>
           <ol class="breadcrumb">
               <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a >Accesorios</a></li>
               <li class="active">Añadir Accesorios</li>
           </ol>
       </section>
           <div class="col-md-12 " >
               <div class="box box-primary">
                   <div class="box-header with-border">
                       <h2 class="box-title">Añadir Accesorio</h2>
                   </div>
                <form role="form">
                 <div class="box-body">
                  <div class="row col-md-12  col-lg-12">
                     <!-- <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="inventario">Numero de Inventario*</label>
                          <input type="text" class="form-control input-sm help-block" id="inventario" name="nombre" placeholder="Numero de Inventario">
                      </div> -->

                     <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="inventario">Numero de Inventario*</label>
                        <div class="input-group margin ">
                            <input type="text" id="inventario" class="form-control input-sm" placeholder="Numero de Inventario">
                            <span class="input-group-btn">
                      <button type="button" id="generarInv" class="btn btn-info input-sm btn-flat"><i class="fa fa-download"></i></button>
                      </span>
                  </div>
                 </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="tipo">Tipo Accesorio</label>
                          <select id="tipo" class="form-control input-sm help-block">

                              <?php cargacombo("SELECT * FROM tipo_accesorio","id_taccesorio","tipo_accesorio") ?>

                          </select>
                      </div>
                  </div>

                     <div class="row col-md-12 col-lg-12">
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="serie">Numero de Serie</label>
                          <input type="text" class="form-control input-sm help-block" id="serie" name="usuario" placeholder="serie">
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="ubicacion">Ubicacion</label>
                          <select id="ubicacion" class="form-control input-sm help-block">

                              <?php cargacombo("select * from departamento", "id_departamento", "nombre_dep");?>

                          </select>
                      </div>
                  </div>

                    <div class="row col-md-12 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="marca">Marca</label>
                            <select class=" form-control input-sm help-block" id="marca" name="marca" >
                                <?php cargacombo("SELECT * FROM marca","id_marca","nombre_marca") ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control input-sm help-block" id="modelo" name="modelo" placeholder="Modelo">
                        </div>





                    </div>


                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="cpu">CPU</label>

                                <select id="cpu" class="form-control input-sm help-block">
                                    <?php cargaComboBox("SELECT id_increment, nombre_cpu, num_inventario FROM cpu","id_increment","nombre_cpu","num_inventario") ?>

                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="estado">Estado</label>
                                <select id="estado" class="form-control input-sm help-block">
                                    <option value="operando">Operando</option>
                                    <option value="bodega">Bodega</option>
                                    <option value="desechado">Desechado</option>

                                </select>

                            </div>

                        </div>


                     <div class="form-group">

                         <label for="descripcion">Descripcion</label>
                         <textarea  class="form-control input-sm" id="descripcion" name="descripcion" placeholder="Nota del Accesorio"></textarea>
                     </div>

                     <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                     <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg">   <span class="glyphicon glyphicon-list"></span>
                             Ver Accesorios</a>
                     </div>
                </form>
                   <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
                   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
                   <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
                   <script type="text/javascript" src="../js/toastr.js"></script>
                   <script type="text/javascript" src="../js/node_modules/custombox/dist/custombox.min.js"></script>
                   <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
                <script>
$(document).ready(function () {
    $.fn.select2.defaults.set("theme", "classic");
    $("#inventario").inputmask("99-999-9999");
    $("select").select2();
    $("#cpu").val('').trigger('change');
    $("#cpu").select2({
        allowClear: true,
        placeholder: "Seleccipne Equipo.."

    });
});
$("#generarInv").click(function () {
    var timestamp = event.timeStamp;
    var d = new Date();
    var seconds = d.getSeconds();
    var year= d.getFullYear();
    var x=year+""+seconds+""+timestamp;
    var SetInventario= x.substring(0, 9);
    $("#inventario").val(SetInventario);
    console.log(SetInventario);
});
 
 $("#guardar").click(function()
        {
    var inventario = $("#inventario").val();
    var tipo = $("#tipo").val();
    var serie = $("#serie").val();
    var ubicacion = $("#ubicacion").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var cpu = $("#cpu").val();
    var estado = $("#estado").val();
    var descri = $("#descripcion").val();


    
     
  if( inventario.trim()=='') {toastr.error("Hay campos que son obligatorios"); return; }
            if (!/^([0-9])*$/.test(marca) || marca.trim()==''){ toastr.error("La marca del Accesorio es invalida"); return;}
            if (!/^([0-9])*$/.test(tipo) || tipo.trim()==''){ toastr.error("El tipo del Accesorio es invalido"); return;}
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"guardar",
                    inventario:inventario,
                    tipo:tipo,
                    serie:serie,
                    ubicacion:ubicacion,
                    marca:marca,
                    modelo:modelo,
                    cpu:cpu,
                    estado:estado,
                    descri:descri


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
                            toastr.error('Error','Ya Existe esa Ip');

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
        document.getElementById("inventario").value="";
        document.getElementById("tipo").value="";
        document.getElementById("serie").value="";


    }
			   function goBack(){ setTimeout(function () { window.location.href = "ver_accesorios.php"; }, 30); }

                </script>
                
                
              </div>
       </div>
   </div>
  

</body>
<?php
function cargacombo($consul,$id,$nombre)
{
    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row[$id]."'>";

        echo $row[$nombre];
        echo "</option>";

    }
}

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