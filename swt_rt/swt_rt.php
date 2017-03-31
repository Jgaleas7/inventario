<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SWITCH</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.js" type="text/javascript"></script>
</head>
<body class="login-page">
<a  onclick="goBack()" class="btn bg-navy btn-flat btn-lg">   <span class="glyphicon glyphicon-list"></span>
Ver Switch/Router</a>

   
   <div id="cuerpo" class="col-md-12" >

           <div class="col-md-12 " >
               <div class="box box-primary">
                   <div class="box-header with-border">
                       <h2 class="box-title">Añadir Switch o Router</h2>
                   </div>
                <form role="form">
                 <div class="box-body">
                  
                  <div class="row col-lg-12 col-md-12 ">
                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="inventario">Numero de Inventario*</label>
                          <input type="text" class="form-control input-sm help-block" id="inventario" name="nombre" placeholder="Numero de Inventario">
                      </div>

                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="tipo">Tipo Dispositvo</label>
                          <select id="tipo" class="form-control input-sm help-block">
                              <option value="switch">Switch</option>
                              <option value="router">Router</option>
                          </select>
                      </div>

                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="nombre">Nombre del dispositivo</label>
                          <input type="text" class="form-control input-sm help-block" id="nombre" name="usuario" placeholder="Ejem switcher9">
                      </div>

                  </div>

                     <div class="row col-md-12 col-lg-12">

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="marca">Marca</label>
                             <select class=" form-control help-block" id="marca" name="marca" >
                                 <?php cargacombo("SELECT * FROM marca","id_marca","nombre_marca") ?>
                             </select>
                         </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="modelo">Modelo</label>
                             <input type="text" class="form-control input-sm help-block" id="modelo" name="modelo" placeholder="Modelo">
                         </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="plibres">Puertos libres</label>
                             <input type="number" class="form-control input-sm help-block" id="plibres" name="usuario" placeholder="Puertos libres">
                         </div>
                  </div>

                     <div class="row col-md-12 col-lg-12">
                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="serie">Serie</label>
                             <input type="text" class="form-control input-sm help-block" id="serie" name="serie" placeholder="Serie">
                         </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="serie">Cantidad de SFP</label>
                             <input type="number" class="form-control input-sm help-block" id="sfp" name="usuario" placeholder="Cantidad de puertos SFP">
                         </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                             <label for="red">Red Fisica</label>
                             <input type="number" class="form-control input-sm help-block" id="red" name="modelo" placeholder="Red Fisica en la que está ejem 10 o 100">
                         </div>
                     </div>

                     <div class="row col-md-12 col-lg-12">
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="serie">Usuario</label>
                          <input type="text" class="form-control input-sm help-block" id="usuario" name="usuario" placeholder="usuario para acceder">
                      </div>

                         <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                             <label for="modelo">Contraseña</label>
                             <input type="text" class="form-control input-sm help-block" id="pass" name="modelo" placeholder="pass para acceder">
                         </div>


                  </div>

                    <div class="row col-md-12 col-lg-12">


                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="ubicacion">Ubicacion</label>
                            <select id="ubicacion" class="form-control input-sm help-block">

                                <?php cargacombo("SELECT * FROM edificio","id_edificio","nombre_edificio");?>

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

                        <div class="row col-md-12 col-lg-12">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="clave">Responsable</label>

                                <select id="responsable" class="js-example-basic-multiple select2 form-control help-block">

                                    <?php cargacombo("SELECT id, concat(nombre,' ', apellido) AS nombre FROM empleados","id","nombre");?>

                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                                <label for="ip">Dirección Ip</label>
                                <input type="text" class="form-control input-sm help-block" id="ip" name="ip" placeholder="Internet Protocol">
                            </div>

                        </div>

                     <div class="form-group">
                         <label for="descripcion">Descripcion</label>
                         <textarea  class="form-control" id="descripcion" name="descripcion" placeholder="Describa el Equipo"></textarea>
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
   $("#responsable").select2();


});

$("#tipo").change(function() {

    if (this.value=="switch"){

        $("#sfp").prop( "disabled", false );
    }if (this.value=="router"){
        $("#sfp").prop( "disabled", true );
    }

});
 
 $("#guardar").click(function()
        {
    var inventario = $("#inventario").val();
    var tipo = $("#tipo").val();
    var nombre = $("#nombre").val();
    var serie = $("#serie").val();
    var plibres = $("#plibres").val();
    var sfp = $("#sfp").val();
    var red = $("#red").val();
    var ubicacion = $("#ubicacion").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var responsable = $("#responsable").val();
    var estado = $("#estado").val();
    var ip = $("#ip").val();
    var pass = $("#pass").val();
    var usuario = $("#usuario").val();
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
                    nombre:nombre,
                    plibres:plibres,
                    serie:serie,
                    ip:ip,
                    red:red,
                    sfp:sfp,
                    ubicacion:ubicacion,
                    marca:marca,
                    modelo:modelo,
                    responsable:responsable,
                    estado:estado,
                    usuario:usuario,
                    pass:pass,
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
			   function goBack(){ setTimeout(function () { window.location.href = "ver_swt_rt.php"; }, 30); }

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