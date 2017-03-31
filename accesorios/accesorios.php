<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accesorios</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
     <link rel="stylesheet" href="../js/node_modules/custombox/dist/custombox.min.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
       <script type="text/javascript" src="../js/node_modules/custombox/dist/custombox.min.js"></script>
</head>
<body class="login-page">
<a  onclick="goBack()" class="btn bg-navy btn-lg">   <span class="glyphicon glyphicon-list"></span>
Ver Accesorios</a>

   
   <div id="cuerpo" class="col-md-12" >
           <div class="col-md-12 " >
               <div class="box box-primary">
                   <div class="box-header with-border">
                       <h2 class="box-title">Añadir Accesorio</h2>
                   </div>
                <form role="form">
                 <div class="box-body">
                  <div class="row col-md-12  col-lg-12">
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="inventario">Numero de Inventario*</label>
                          <input type="text" class="form-control input-sm help-block" id="inventario" name="nombre" placeholder="Numero de Inventario">
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

                              <?php cargacombo("SELECT * FROM edificio","id_edificio","nombre_edificio");?>

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
                     <div class="box" id="modal" style="display: none">
                         <div class="box-header with-border">
                             <h3 class="box-title">Default Box Example</h3>
                             <div class="box-tools pull-right">
                                 <!-- Buttons, labels, and many other things can be placed here! -->
                                 <!-- Here is a label for example -->
                                 <span class="fa-times ">x</span>
                             </div><!-- /.box-tools -->
                         </div><!-- /.box-header -->
                         <div class="box-body">
                             The body of the box
                         </div><!-- /.box-body -->
                         <div class="box-footer">
                             The footer of the box
                         </div><!-- box-footer -->
                     </div><!-- /.box -->


                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="clave">Responsable</label>

                                <select id="responsable" class="form-control input-sm help-block">

                                    <?php cargacombo("SELECT id, concat(nombre,' ', apellido) AS nombre FROM empleados","id","nombre");?>

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
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                    <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                     </div>
                </form>
                   <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
                <script>
$(document).ready(function () {
    $("#inventario").inputmask("99-999-9999");
});
 
 $("#guardar").click(function()
        {
    var inventario = $("#inventario").val();
    var tipo = $("#tipo").val();
    var serie = $("#serie").val();
    var ubicacion = $("#ubicacion").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var responsable = $("#responsable").val();
    var estado = $("#estado").val();
    var descri = $("#descripcion").val();


    
     
  if( inventario.trim()=='')
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
                    inventario:inventario,
                    tipo:tipo,
                    serie:serie,
                    ubicacion:ubicacion,
                    marca:marca,
                    modelo:modelo,
                    responsable:responsable,
                    estado:estado,
                    descri:descri


                },
                success: function(data)
                {
					if(data=="bien"){
                        toastr.success('Exito','se ha Guardado correctamnete');
                        limpiarcampos();
                    }
                    if(data=="Error"){
					    toastr.error("Error", "Ha ocurrido un Error"+data);
                    }

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
    include('../config/conexion.php');
    $resul=mysqli_query($mysqli,$consul);
    while ($row=mysqli_fetch_array($resul))
    {
        echo "<option value='".$row[$id]."'>";

        echo $row[$nombre];
        echo "</option>";

    }
}
?>
</html>