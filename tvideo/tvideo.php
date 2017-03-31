<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T Video</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body>
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">  
   
   <div id="cuerpo" class="col-md-8" >
       <header class="header">
       <center><strong><h2>Tarjeta de Video</h2></strong></center>
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
                      <label for="marca">Marca</label>
                       <select class="js-example-basic-multiple input-sm form-control  help-block" id="marca" name="marca" required style="width: 95%" >
                           <?php cargaComboBox("SELECT * FROM `marca`","id_marca","nombre_marca","descri") ?>
                       </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="modelo"> Modelo</label>
                      <input type="text" class="form-control input-sm" id="modelo" name="modelo" placeholder="Modelo">
                    </div>

                     <div class="form-group">
                      <label for="memoria"> Memoria</label>
                      <input type="text" class="form-control input-sm" id="memoria" name="memoria" placeholder="Memoria">
                    </div>
                   
                
                     
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                    <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                  </div>
                </form>
                
                <script> 
 
 $("#guardar").click(function()
        {
    var marca = $("#marca").val();
    var modelo= $("#modelo").val();
    var memoria= $("#memoria").val();

    
     
  if( marca.trim()=='')
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
                    marca:marca,
                    modelo:modelo,
                    memoria:memoria
                    
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
        document.getElementById("memoria").value="";
        document.getElementById("modelo").value="";
        
    }
							         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_tvideo.php";  }, 30);
             
         }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>
<?php
function cargaComboBox($consul,$id,$nombre, $apellido)
{
    include('../config/conexion2.php');

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