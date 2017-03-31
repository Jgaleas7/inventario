<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubicacion</title>
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
       <center><strong><h1>Ubicación</h1></strong></center>
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
                      <label for="ubicacion">Nombre Ubicacion</label>
                      <input type="text" class="form-control " id="ubicacion" name="ciudad" placeholder="ubicacion">
                    </div>

                     <div class="form-group">
                         <label for="departamento">Departamento</label>

                               <select class=" form-control js-example-basic-multiple select  help-block" id="departamento" multiple="multiple" name="marca" placeholder="Departamento">
                                   <?php cargaComboBox("SELECT * FROM departamento","id_departamento","nombre_dep") ?>


                               </select>
                     </div>

                     <hr>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                    <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                  </div>
                </form>
                

                
                
              </div>
       </div>
   </div>
  

</body>
<script>
    $(document).ready(function () {
        $("#departamento").select2();

    });

    $("#guardar").click(function()
    {
        var ubicacion = $("#ubicacion").val();
        var departamento= $("#departamento").val();



        if( ubicacion.trim()=='')
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
                    ubicacion:ubicacion,
                    departamento:departamento

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
        document.getElementById("ubicacion").value="";
        $("#departamento").val('').trigger('change')


    }
    function goBack(){


        setTimeout(function(){  window.location.href="ver_ubicacion.php";  }, 30);

    }

</script>
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