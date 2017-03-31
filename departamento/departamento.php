<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departamento</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../plugins/select2/select2.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.js" type="text/javascript"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body>
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">  
   
   <div id="cuerpo" class="col-md-8" >
       <header class="header">
       <center><strong><h1>Crear Departamento</h1></strong></center>
       </header>
      
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  
                   <div class="form-group">
                      <label for="marca">Nombre Departamento</label>
                      <input type="text" class="form-control input-lg" id="departamento" name="marca" placeholder="nombre departamento">
                    </div>

                     <div class="form-group">
                         <label for="edificio">Edificio</label>

                         <select class=" form-control js-example-basic-multiple select  help-block" id="edificio" multiple="multiple" name="marca" placeholder="edificio">
                             <?php cargaComboBox("SELECT * FROM edificio","id_edificio","nombre_edificio") ?>

                         </select>
                     </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                    <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                  </div>
                </form>
                
                <script> 
 $(document).ready(function () {
     $("#edificio").select2();
 });

 $("#guardar").click(function()
        {

    var departamento= $("#departamento").val();
    var edificio= $("#edificio").val();

    
     
  if( departamento.trim()=='')
            {
               toastr.error("Hay campos que son obligatorios");
                return;
            }
            if( edificio.trim()=='')
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
                    departamento:departamento,
                    edificio:edificio

                },
                success: function(data)
                {
					alert(data);
                  toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })
     
     
 });
                    
    function limpiarcampos(){

        document.getElementById("departamento").value="";

        $("#edificio").val('').trigger('change');
    }
							         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_departamento.php";  }, 30);
             
         }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>
<?php
function cargaComboBox($consul,$id,$nombre)
{
    include('../config/conexion2.php');

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